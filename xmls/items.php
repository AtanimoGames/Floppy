<?php
header('Content-Type: application/xml; charset=utf-8');
require_once '../config/config.php';

$SQLGetInfo = $odb -> query("SELECT itemId,itemType,itemName,tradeable FROM itemslist ORDER BY itemId");


echo '<items>';

while ($row = $SQLGetInfo->fetch(PDO::FETCH_ASSOC)) {
	
	echo '<item id="'.$row["itemId"].'">';
	echo '<type>'.$row["itemType"].'</type>';
	echo '<name>'.$row["itemName"].'</name>';
	echo '<tradeable>'.$row["tradeable"].'</tradeable>';
	echo '</item>';
}

echo '</items>';
?>