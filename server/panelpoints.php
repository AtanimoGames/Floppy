<?php
require_once '../config/config.php';

$_01 = htmlentities(htmlspecialchars($_POST["01"]));
$_11 = htmlentities(htmlspecialchars($_POST["118"]));

$UpdateData = $odb -> prepare("UPDATE users SET age = :age + age WHERE username = :username");
$UpdateData -> execute(array(':age' => $_11, ':user' => $_01));


?>