<?php
require_once '../config/config.php';

$_01 = htmlentities(htmlspecialchars($_POST["01"]));
$_11 = htmlentities(htmlspecialchars($_POST["200"]));

$UpdateData = $odb -> prepare("UPDATE users SET level = :level + gems WHERE username = :username");
$UpdateData -> execute(array(':level' => $_11, ':user' => $_01));
?>