<?php
//require_once "functions.php";
//require_once "./models/PageData.class.php";
//requireFile("models", "PageData.class.php");
//----------init: database, session, pggae-dataSerialize
//session
session_start();
//database
$dbInfo = "mysql:host=localhost;dbname=cms_simple-project_php-raw02";
$dbUser = "root";
$dbPassword = "ifrc";
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//echo "you have inited";
//----------modify view/page
//use models\PageData;
//$pageData = new PageData();