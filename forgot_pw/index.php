<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="forgot_pw_style.css">
</head>
<body>
<?php

try {
    require("../connect.php");
    $id = strip_tags(trim($_GET['id']));
    $lang = strip_tags(trim($_GET['lang']));
    $password = $lang == 1 ? "Jelszó:" : "Password:";
    $confirm_password = $lang == 1 ? "Jelszó megerősítése:" : "Confirm password:";
    $sql = "SELECT username FROM users WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        $data = $result -> fetch_assoc();
        $username = $data['username'];
        $h1 = $lang == 1 ? "$username felhasználó jelszavának megváltoztatása!" : "Change password for $username!";
    }
    else {
        $h1 = $lang == 1 ? "Felhasználó nem található!" : "Account cannot be found!";
    }
    
} catch (\Throwable $th){ 
    $h1 = $lang == 1 ? "Hiba történt a szerverrel való kommunikáció során, kérjük próbáld újra később!" : "Something went wrong while communicating with the server, please try again later!";
}
$date = $lang == 1 ? "Ma: ".date("Y/m/d")." ". date("H:i") :"Today is: ".date("Y/m/d")." ". date("H:i");
$madeby = $lang == 1 ? "<p>Készítette: <a target='blank' href='http://balazsmolnar.hopto.org'>Balazs Molnar</a> </p>"  : "<p>Made by <a target='blank' href='http://balazsmolnar.hopto.org'>Balazs Molnar</a> </p>";
$both_passwords = $lang == 1 ? "Mindkét jelszónak egyeznie kell!" : "Both passwords need to match!";
$submit = $lang == 1 ? "Küldés" : "Submit";

?>
<div class="nav justify-content-end">
  <h1 class="nav-title">TIC-TAC-TOE</h1>
</div>


<div class="content container">
        <div class="container form col-lg-12 col-md-12 col-sm-12 text-center">
	<h1 id="title" class="text-center"><?php echo($h1) ?></h1>
            <form id="form" action="change_pw.php" method="POST">
                <p id="password-match"><?php echo($both_passwords) ?></p>
                <input type="hidden" value="<?php echo($id)?>" name="id" id="id">
                <input type="hidden" value="<?php echo($lang)?>" name="lang" id="lang">
                <table>
                    <tbody>
                        <tr>
                            <td><label for="pw"><?php echo($password) ?></label></td>
                            <th><input onkeyup="Verify_submit()" type="password" name="pw" id="pw"></th>
                        </tr>
                        <tr>
                            <td><label for="confirm"><?php echo($confirm_password) ?></label></td>
                            <th><input onkeyup="Verify_submit()" type="password" name="confirm"     id="confirm"></td>
                        </tr>
                        <tr>
                            <th colspan="2"><button type="submit" id="button"><?php echo($submit) ?></button></th>
                        </tr>
                    </tbody>
                </table>
                <div class="container col-lg-12 col-md-12 col-sm-12 password-check">
                <h1  id="password-feedback" class=" text-center"></h1>
            </div>
            </form>
        </div>
            
            <!-- <div class="logo col-lg-5 col-md-12 col-sm-12">
                <img src="logo.png" alt="">
            </div> -->
    
</div>
<footer>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 col-md-4 col-sm-12 footer-text">
                    <p><?php echo($date)  ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 footer-text">
                <p><?php echo($madeby)  ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 footer-text">
                    <?php echo($date)  ?>
                </div>
            </div>
        </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="password-check.js"></script>
</body>
</html>