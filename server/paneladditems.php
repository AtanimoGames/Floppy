<?php
require_once '../config/config.php';

$_01 = htmlentities(htmlspecialchars($_POST["01"]));
$_17 = htmlentities(htmlspecialchars($_POST["11117"]));
$_18 = htmlentities(htmlspecialchars($_POST["11118"]));
$_19 = htmlentities(htmlspecialchars($_POST["11119"]));


$SQLGetInfo = $odb -> prepare("SELECT * FROM itemslist WHERE itemId = :id AND itemType = :type AND itemName = :name AND tradeable = :trade");
$SQLGetInfo -> execute(array(':id' => $_01, ':type' => $_17, ':name' => $_18, ':trade' => $_19));
$data = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);
if(!$data["itemId"]) {
	$logAddr = $odb->prepare("INSERT INTO itemslist (itemId, itemType, itemName, tradeable)VALUES (:id, :type, :name, :trade)");
	$logAddr->execute(array(":id" => $_01, ":type" => $_17, ":name" => $_18, ":trade" => $_19));
}

$i = 0;

$row = $SQLGetInfo->fetch(PDO::FETCH_ASSOC);
$i++;
echo '&item_'.$i.'_id='.$row["itemType"];
echo '&item_'.$i.'_type='.$row["itemName"];
echo '&item_'.$i.'_type='.$row["tradeable"];

$i++;
echo '&nums='.$i.'&';




?>