<?php
require_once '../config/config.php';

$_01 = $_POST["01"];
$_11 = $_POST["119"];

$UpdateData = $odb -> prepare("UPDATE users SET coins = :coins WHERE username = :username");
$UpdateData -> execute(array(':coins' => $_11, ':username' => $_01));
?>