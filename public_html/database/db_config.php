<?php
/****************************************************/
/************** Created by : Adam Mwangaila ************/
/***************     adamngaila@gmail.com   *************/
/***************    0686036401   *************/

define('DB_USER', "id18897796_foodmanager");     
define('DB_PASSWORD', "FoodTFTproject01@");			
define('DB_DATABASE', "id18897796_foodordersmanager"); 
define('DB_SERVER', "localhost");	

$dbHost     = "localhost";
$dbUsername = "id18897796_foodmanager";
$dbPassword = "FoodTFTproject01@";
$dbName     = "id18897796_foodordersmanager";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>