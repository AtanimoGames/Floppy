<?php
require_once '../config/config.php';


$username = htmlentities(htmlspecialchars($_POST["01"]));
$password = htmlentities(htmlspecialchars($_POST["10"]));

$SQLGetInfo = $odb -> prepare("SELECT * FROM users WHERE username = :username AND password = :password");
$SQLGetInfo -> execute(array(':username' => $username, ':password' => $password));
$data = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);

if($data["username"]){
$getData = $odb -> prepare("SELECT * FROM items WHERE username = :username ORDER BY id DESC");
$getData -> execute(array(':username' => $username));
$data = $getData -> fetch(PDO::FETCH_ASSOC);

$i = 0;
if($data){
	
while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
$i++;
echo '&item_'.$i.'_orgid='.$row["id"];
echo '&item_'.$i.'_id='.$row["itemid"];
echo '&item_'.$i.'_type='.$row["itemtype"];
}
$i++;
echo '&nums='.$i.'&';
}
}

?>