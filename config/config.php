<?php
	error_reporting(1);
	ini_set("display_errors", "On");
	ini_set('memory_limit', '-1');

	date_default_timezone_set('Asia/Jerusalem');
	 
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'flopy');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');

	$odb = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ";charset=utf8", DB_USERNAME, DB_PASSWORD);
	$odb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	function getHeader() {
		echo '<html lang="he" style="
"><head>
      <meta charset="utf-8">
      <title>פלופי עולם וירטואלי</title>
      <link rel="icon" href="icon.PNG" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="style.css">
	</head>
   <body>
      <div class="nav" style="
    direction: ltr;
">
         <li><a href="phpBB3/index.php">פורום</a></li>
         <li><a href="https://orbalulu8760.wixsite.com/flopy">חנות</a></li>
         <li><a href="regulations">תקנון</a></li>
		 <li><a href="play">התחל לשחק</a></li>
		 <li><a href="register">הרשמה</a></li>
         <li><a href="index">ראשי</a></li>
      </div>
<div class="nav" style="
    background-color: #3080a9;
    padding: 10px;
">
    <center style="
    font-size: 16px !important;
    direction: rtl;
">הודעת מערכת: XXXX XXXX XXX XXX XXX</center>
</div>';
	}
?>