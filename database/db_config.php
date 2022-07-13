<?php
/****************************************************/
/************** Created by : Adam Mwangaila ************/
/***************     adamngaila@gmail.com   *************/
/***************    0686036401   *************/

define('DB_USER', "ehdo64503lru4pkg");     
define('DB_PASSWORD', "qu7jjc6m3mpt6d3p");			
define('DB_DATABASE', "l1k9sc6pvhkdwh6l"); 
define('DB_SERVER', "lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com");	

$dbHost     = "lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$dbUsername = "ehdo64503lru4pkg";
$dbPassword = "qu7jjc6m3mpt6d3p";
$dbName     = "l1k9sc6pvhkdwh6l";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
