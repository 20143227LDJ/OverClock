<?php
$name = "url";
$value = $_POST['url'];

setcookie($name, $value);
header('Location: ../');
?>