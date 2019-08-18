<?php
require_once '../config/config.php';


$SQLGetInfo = $odb -> prepare("SELECT * FROM users WHERE username = :username AND password = :password");
$SQLGetInfo -> execute(array(':username' => htmlentities(htmlspecialchars($_GET['u'])), ':password' => htmlentities(htmlspecialchars($_GET['p']))));
$data = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);

if($data["username"]){
echo 'res=success&username='.$data["username"].
'&_15='.$data["admin"].
'&_14='.$data["level"].
'&_13='.$data["age"].
'&_12='.$data["gems"].
'&_11='.$data["sk"].
'&_10='.$data["gs"].
'&_9='.$data["hd"].
'&_8='.$data["coins"].
'&_7='.$data["cr"].
'&_6='.$data["nk"].
'&_5='.$data["bd"].
'&_4='.$data["ht"].
'&_3='.$data["sz"].
'&_2='.$data["ps"].
'&_1='.$data["st"].
'&_0='.$data["hr"];
}else{
echo 'res=error_username_or_password';
}