<?php
require_once '../config/config.php';

$_01 = htmlentities(htmlspecialchars($_POST["01"]));
$_17 = htmlentities(htmlspecialchars($_POST["117"]));
$_18 = htmlentities(htmlspecialchars($_POST["118"]));

$SQLGetInfo = $odb -> prepare("SELECT * FROM items WHERE username = :username AND itemid = :id AND itemtype = :type");
$SQLGetInfo -> execute(array(':username' => $_01, ':id' => $_17, ':type' => $_18));
$data = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);

$i = 0;
if($data){
	$logAddr = $odb->prepare("INSERT INTO items (username, itemid, itemtype) VALUES (:user, :id, :type)");
	$logAddr->execute(array(":user" => $_01, ":id" => $_17, ":type" => $_18));

while ($row = $SQLGetInfo->fetch(PDO::FETCH_ASSOC)) {
$i++;
echo '&item_'.$i.'_id='.$row["itemid"];
echo '&item_'.$i.'_type='.$row["itemtype"];
}
$i++;
echo '&nums='.$i.'&';
}




?>