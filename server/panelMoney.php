<?php
require_once '../config/config.php';

$_01 = htmlentities(htmlspecialchars($_POST["01"]));
$_11 = htmlentities(htmlspecialchars($_POST["121"]));

$UpdateData = $odb -> prepare("UPDATE users SET gems = :gems + gems WHERE username = :username");
$UpdateData -> execute(array(':gems' => $_11, ':user' => $_01));

?>