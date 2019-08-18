<?php
require_once '../config/config.php';

$username = htmlentities(htmlspecialchars($_GET["u"]));
$itemId = htmlentities(htmlspecialchars($_GET["itemId"]));

$SQLGetInfo = $odb -> prepare("SELECT * FROM items WHERE username = :username AND id = :id");
$SQLGetInfo -> execute(array(':username' => $username, ':id' => $itemId));
$row = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);

if($row["username"]){
echo '&status=true&itemId='.$row["itemid"].'&itemType='.$row["itemtype"];
}else{
echo '&status=false&';
}
?>