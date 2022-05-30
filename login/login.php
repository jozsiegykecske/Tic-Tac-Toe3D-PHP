<?php
try {
    require("../connect.php");
} catch (\Throwable $th) {
    echo(-1);
    exit();
}
$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));
$sql = "SELECT * FROM users INNER JOIN user_settings on users.id = user_settings.user_id WHERE users.username = '$username' AND active = '1'";
$result = mysqli_query($conn,$sql);
if ($result -> num_rows == 0) {
    echo(0);
    exit;
}
$row = $result -> fetch_assoc();
if (password_verify($password,$row['password'])) {
    $data = $row['id']."/".$row['username']."/".$row['resolution']."/".$row['quality_index']."/".$row['fullscreen'].'/'.$row['music_volume'].'/'.$row['effect_volume'];
    echo($data);
    exit();
}
echo(0);
exit;
?>
