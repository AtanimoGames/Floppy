<?php
require_once '../config/config.php';

for($i = 0; $i < count(explode(",",$_GET["u1items"])); $i++){
$UpdateData = $odb -> prepare("UPDATE items SET username = :username WHERE items.id = :itemId");
$UpdateData -> execute(array(':username' => htmlentities(htmlspecialchars($_GET["u2"])), ':itemId' => explode(",",$_GET["u1items"])[$i]));
}

for($i = 0; $i < count(explode(",",$_GET["u2items"])); $i++){
$UpdateData = $odb -> prepare("UPDATE items SET username = :username WHERE items.id = :itemId");
$UpdateData -> execute(array(':username' => htmlentities(htmlspecialchars($_GET["u1"])), ':itemId' => explode(",",$_GET["u2items"])[$i]));
}

echo '&status=true&';
?>