<?php
require_once '../config/config.php';

$username = htmlentities(htmlspecialchars($_POST["01"));
$password = htmlentities(htmlspecialchars($_POST["10"));
$_11 = htmlentities(htmlspecialchars($_POST["11"));
$_12 = htmlentities(htmlspecialchars($_POST["12"));

$getData = $odb -> prepare("SELECT * FROM users WHERE username = :username AND password = :password");
$getData -> execute(array(':username' => $username, ':password' => $password));
$data = $getData -> fetch(PDO::FETCH_ASSOC);


if($data["username"]){
	if($_11 == "0")
	{
		$UpdateData = $odb -> prepare("UPDATE users SET `" . $_12 . "` = :11 WHERE username = :username");
		$UpdateData -> execute(array(':11' => $_11, ':username' => $username));
		die("res=success");
	}

	$getData = $odb -> prepare("SELECT * FROM items WHERE username = :username AND itemid = :id AND itemtype = :type");
	$getData -> execute(array(':username' => $username, ':id' => $_11, ':type' => $_12));
	$data = $getData -> fetch(PDO::FETCH_ASSOC);
	

	if($data["itemid"]){
		$UpdateData = $odb -> prepare("UPDATE users SET `" . $_12 . "` = :11 WHERE username = :username");
		$UpdateData -> execute(array(':11' => $_11, ':username' => $username));
		die("res=success");
	}
}
?>