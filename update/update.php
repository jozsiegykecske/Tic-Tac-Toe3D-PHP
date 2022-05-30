<?php
try {
    require("../connect.php");
} catch (\Throwable $th) {
    echo(-1);
    exit();
}
$user_id = strip_tags(trim($_POST['id']));
$res = strip_tags(trim($_POST['res']));
$quality = strip_tags(trim($_POST['quality']));
$fullscreen = strip_tags(trim($_POST['fullscreen']));
$music_volume = strip_tags(trim($_POST['music_volume']));
$effect_volume = strip_tags(trim($_POST['effect_volume']));
$sql = "UPDATE user_settings SET resolution = '$res', quality_index = '$quality', fullscreen = '$fullscreen', music_volume = '$music_volume', effect_volume = '$effect_volume' WHERE user_id = '$user_id'";
mysqli_query($conn,$sql);
echo(1);
exit();
?>