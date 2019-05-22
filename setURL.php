<?php
$name = "url";
$value = "http://". $_POST['url'];

setcookie($name, $value);
header('Location: ../');
?>