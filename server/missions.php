<?php
require_once '../config/config.php';


$_0 = htmlentities(htmlspecialchars($_POST["01"]));
$_1 = htmlentities(htmlspecialchars($_POST["111"]));
$_2 = htmlentities(htmlspecialchars($_POST["112"]));
$_3 = htmlentities(htmlspecialchars($_POST["113"]));
$_4 = htmlentities(htmlspecialchars($_POST["114"]));

$SQLGetInfo = $odb -> prepare("SELECT * FROM missions WHERE username = :username");
$SQLGetInfo -> execute(array(':username' => $_0));
$data = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);

if(!$data["username"]){
if(!empty($_0)){
$logAddr = $odb->prepare("INSERT INTO missions (username, missions, prize) VALUES (:username, :missions, :prize)");
$logAddr->execute(array(":username" => $$_0, ":missions" => $_1, ":prize" => $_2));

$logAddr = $odb->prepare("INSERT INTO items (username, itemid, itemtype) VALUES (:username, :id, :type)");
$logAddr->execute(array(":username" => $$_0, ":id" => $_3, ":type" => $_4));
if(!empty($_0)){
echo 'res=success';
}else{
echo 'res=username_is_empty';
}
}else{
echo 'res=username_is_unaviable';
}
}

?>