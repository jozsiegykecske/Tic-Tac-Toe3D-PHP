<?php
try {
    require("../connect.php");
} catch (\Throwable $th) {
    echo(-1);
    exit();
}
$email = strip_tags(trim($_POST['email']));
$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));
$lang = $_POST['lang'];
$id = GUID();
$sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = mysqli_query($conn,$sql);
if ($result->num_rows == 0) {
    $encrypted_pw = password_hash($password,PASSWORD_DEFAULT);
    $insert_into_users = "INSERT INTO users (id,email,username,password) VALUES('$id','$email','$username','$encrypted_pw')";
    mysqli_query($conn,$insert_into_users);
    $insert_into_settings = "INSERT INTO user_settings (user_id) VALUES('$id')";
    mysqli_query($conn,$insert_into_settings);
    header("Location:register_mail.php?id=$id&email=$email&username=$username&lang=$lang");
    exit();
}
else {
    echo(1);
    exit();
}
function GUID(){
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
?>