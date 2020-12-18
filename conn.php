<?php
session_start();
//connect to database

$host = 'localhost';
$dbname = 'mystoryz';
$username = 'fliplikesuraj';
$password = 'Abdulbaki0818';

try
{
	$conn = new PDO("mysql: host=$host; dbname=$dbname", $username, $password);
}
catch(PDOException $error)
{
	die("Could not connect to database ($dbname): ".$error->getMessage());
}

// Define constants for easy navigation
define('BASE_URL', 'http://localhost/myfolder/mystoryz');
define('ROOT_PATH', realpath(dirname(__FILE__)));
?>