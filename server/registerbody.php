<?php
require_once '../config/config.php';

$_0 = htmlentities(htmlspecialchars($_POST["01"]));
$_1 = htmlentities(htmlspecialchars($_POST["110"]));
$_2 = htmlentities(htmlspecialchars($_POST["111"]));
$_3 = htmlentities(htmlspecialchars($_POST["112"]));
$_4 = htmlentities(htmlspecialchars($_POST["113"]));
$_5 = htmlentities(htmlspecialchars($_POST["114"]));
$_6 = htmlentities(htmlspecialchars($_POST["115"]));
$_7 = htmlentities(htmlspecialchars($_POST["116"]));
$_8 = htmlentities(htmlspecialchars($_POST["117"]));

$userExists = $odb -> prepare("SELECT COUNT(*) FROM users WHERE username = :username");
$userExists -> execute(array(':username' => $_0));
$userExists = $userExists -> fetchColumn(0);

if($userExists != "0") {
	die("res=username_is_unaviable");
} else {
	if(!$_0) {
		die("res=username_is_empty");
	} else {
		if(!$_1) {
			die("res=password_is_empty");
		} else {
			$logAddr = $odb->prepare("INSERT INTO users (username, password, email, coins, bd, ps, st, level, gems) VALUES (:username, :password, :email, 0, :bd, :ps, :st, :level, 500)");
			$logAddr->execute(array(":username" => $_0, ":password" => $_1, ":email" => $_2, ":bd" => $_4, ":ps" => $_5, ":st" => $_6, ":level" => $_7));
			
			die('res=success');
		}
	}
}


?>