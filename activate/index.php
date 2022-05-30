<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../forgot_pw/forgot_pw_style.css">
    
</head>
<body>
<?php
try {
    require("../connect.php");
    $id = strip_tags(trim($_GET['id']));
    $lang = strip_tags(trim($_GET['lang']));
    $sql = "SELECT username FROM users WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        $sql = "UPDATE users SET active = '1' WHERE id = '$id'";
        $data = $result -> fetch_assoc();
        $username = $data['username'];
        mysqli_query($conn,$sql);
        $h1 = $lang == 1 ? "$username felhasználó sikeresen aktiválva!" : "Account named $username has been activated successfully!";
    }
    else {
        $h1 = $lang == 1 ? "Felhasználó nem található!" : "Account cannot be found!";
    }
} catch (\Throwable $th) {
    $h1 = $lang == 1 ? "Hiba történt a szerverrel való kommunikáció során, kérjük próbáld újra később!" : "Something went wrong while communicating with the server, please try again later!";
}

$date = $lang == 1 ? "Ma: ".date("Y/m/d")." ". date("H:i") :"Today is: ".date("Y/m/d")." ". date("H:i");
$madeby = $lang == 1 ? "<p>Készítette: <a target='blank' href='http://balazsmolnar.hopto.org'>Balazs Molnar</a> </p>"  : "<p>Made by <a target='blank' href='http://balazsmolnar.hopto.org'>Balazs Molnar</a> </p>";
?>
<div class="nav justify-content-end">
  <h1 class="nav-title">TIC-TAC-TOE</h1>
</div>


<div class="content container">
        <div class="container form col-lg-12 col-md-12 col-sm-12 text-center">
            <h1 id="title" class="text-center"><?php echo($h1)?></h1>
        </div>
</div>
<footer>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 col-md-4 col-sm-12 footer-text">
                    <p><?php echo($date)  ?></p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 footer-text">
                    <?php echo($madeby) ?>
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
</body>
</html>