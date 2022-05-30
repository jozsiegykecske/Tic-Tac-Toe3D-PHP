<?php
require("../connect.php");
$id =$_GET['id'];
$username = $_GET['username'];
$msg = "";
$lang = $_GET['lang'];
$welcome = $lang == 1 ? "Üdv, $username!" : "Welcome, $username!";
$header1 = $lang == 1 ? "Köszönjük, hogy regisztráltál a játékunkra! Ahhoz, hogy be tudj lépni a fiókodba ahhoz aktiválnod kell azt az alábbi gombbal!" : "Thank you for signing up tp our game! To be able to log into your account you must activate it with the button below!";
$activate_account = $lang == 1 ? "Aktiválom a fiókom" : "Activate my account";
$header2 = $lang == 1 ? "Vagy ki is tudod törölni az alábbi gombra kattintva!" : "Or you can delete it by clicking the button below!";
$delete = $lang == 1 ?"Törlöm a fiókom" : "Delete my account";
$subject = $lang == 1 ? "Fiók aktiválása" : "Activate account";
$footer = $lang == 1 ? "Készítette: Molnár Balázs" : "Made by Balázs Molnár";
$msg = "
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
                <td colspan='2' style='padding: 10px;'>$header1</td>
            </tr>
            <tr>
                <td colspan='2' style='padding: 10px;'><a target='blank' href='http://tictactoe3d.ddns.net/tictactoe/activate/?lang=$lang&id=$id'><button style='background-color: white; color: black; padding: 10px; border: 0px;'>$activate_account</button></a></td>
            </tr>
            <tr>
                <td colspan='2' style='padding: 10px;'>$header2</td>
            </tr>
            <tr>
                <td colspan='2' style='padding: 10px;''><a target='blank' href='http://tictactoe3d.ddns.net/tictactoe/delete/?lang=$lang&id=$id'><button style='background-color: white; color: black; padding: 10px; border: 0px;'>$delete</button></a></td>
            </tr>
        </tbody>
    </table>
<footer style='border-top: 2px solid white;padding: 10px; text-align: center;'>
    <p>$footer</p>
</footer>
</body>
</html>
";
$email = strip_tags(trim($_GET['email']));
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($email,$subject,$msg,$headers);
echo("0");
?>