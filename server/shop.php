<?php
require_once '../config/config.php';

$shopid = htmlentities(htmlspecialchars($_GET["01"]));
if(!$shopid) $shopid = 1;

if(!is_numeric($shopid)) { die(); }

$SQLGetInfo = $odb -> prepare("SELECT * FROM shop WHERE shopid = :id");
$SQLGetInfo -> execute(array(':id' => $shopid));

$st = 0;
while ($row = $SQLGetInfo->fetch(PDO::FETCH_ASSOC)) {
	
        $st++;
        echo 'itemid_'.$st.'='.$row["itemid"].'&itemtype_'.$st.'='.$row["itemtype"].'&itemprice_'.$st.'='.$row["price"].'&';
}

echo 'rows='.$st;

?>