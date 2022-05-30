<?php
try {
    require("../connect.php");
} catch (\Throwable $th) {
    echo(-1);
    exit();
}
$email = $_POST['email'];
$lang = $_POST['lang'];
$sql = "SELECT id,username FROM users WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
if ($result -> num_rows == 1) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $username = $row['username'];
    $welcome = $lang == 1 ? "Üdv, $username!" : "Welcome, $username!";
    $change_password = $lang == 1 ? "A jelszavad megváltoztatásához kérjük kattints az alábbi gombra!" : "To change your password, please click the button below!";
    $change_password_button = $lang == 1 ? "Megváltoztatom a jelszavam" : "Change my password";
    $subject = $lang == 1 ? "Jelszó megváltoztatása" : "Change password";
    $footer = $lang == 1 ? "Készítette: Molnár Balázs" : "Made by Balázs Molnár";
    $msg="
    <html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
        </style>
    </head>
    <body style='background-color: blue; color: white; font-family: Varela Round,sans-serif;'>
        <div class='nav' style='border-bottom: 2px solid white; padding: 10px; text-align: center;'>
            <h1 style='text-decoration: underline;font-family: Roboto slab,sans-serif; margin: auto; width: 99%;'>TIC-TAC-TOE</h1>
        </div>
        <table style='margin: auto;text-align: center; padding: 20px; width: 99%;'>
            <tbody>
                <tr>
                    <th><h1 style='font-family: Fredoka,sans-serif;'>$welcome</h1></th>
                    <th></th>
                </tr>
                <tr>
                    <td colspan='2' style='padding: 10px;'>$change_password</td>
                </tr>
                <tr>
                    <td colspan='2' style='padding: 10px;'><a target='blank' href='http://tictactoe3d.ddns.net/tictactoe/forgot_pw/?lang=$lang&id=$id'><button style='background-color: white; color: black; padding: 10px; border: 0px;'>$change_password_button</button></a></td>
               
            </tbody>
        </table>
    <footer style='border-top: 2px solid white;padding: 10px; text-align: center;'>
        <p>$footer</p>
    </footer>
    </body>
    </html>
";
    
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($email,$subject,$msg,$headers);
echo("1");
}
else{
    echo("0");
}
?>