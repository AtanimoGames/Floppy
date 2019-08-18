<?php
require_once '../config/config.php';


$username = htmlentities(htmlspecialchars($_GET["00"]));
$password = htmlentities(htmlspecialchars($_GET["01"]));
$itemId = htmlentities(htmlspecialchars($_GET["02"]));
$itemType = htmlentities(htmlspecialchars($_GET["03"]));

$itemPrice = $odb -> prepare("SELECT price FROM shop WHERE itemid = :id AND itemtype = :type");
$itemPrice -> execute(array(':id' => $itemId, ':type' => $itemType));
$itemPrice = $itemPrice -> fetchColumn(0);

$st = "fail";
if($itemPrice){
		$myCoins = $odb -> prepare("SELECT gems FROM users WHERE username = :username AND password = :password");
		$myCoins -> execute(array(':username' => $username, ':password' => $password));
		$myCoins = $myCoins -> fetchColumn(0);

        if($myCoins != null){
				$data = $odb -> prepare("SELECT username FROM items WHERE username = :username AND itemid = :itemid AND itemtype = :type");
				$data -> execute(array(':username' => $username, ':itemid' => $itemId, ':type' => $itemType));
				$data = $data -> fetchColumn(0);
                if(!$data){
                        if((int)$itemPrice <= (int)$myCoins){
								$UpdateData = $odb -> prepare("UPDATE users SET gems = gems - :item WHERE username = :user");
								$UpdateData -> execute(array(':item' => $itemPrice, ':user' => $username));

                                $st = "success";
								$logAddr = $odb->prepare("INSERT INTO items (username, itemid, itemtype)VALUES (:username, :id, :type)");
								$logAddr->execute(array(":username" => $username, ":id" => $itemId, ":type" => $itemType));
                        }else{
                                $st = "not_enough_coins";
                        }
                }else{
                        $st = "already_bought";
                }
        }
}
echo 'status='.$st;

?>