<?php
session_start();
//connect to database

/* localhost config
$host = '127.0.0.1';
$dbname = 'mystoryz';
$username = 'fliplikesuraj';
$password = 'Abdulbaki0818';
*/

$url= parse_url(getenv("CLEAR_DATABASE_URL"));
$host = $url["host"];
$username = $url["pass"];
$password = $url["pass"];
$dbbname = substr($url["path"], 1)

try
{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}
catch(PDOException $error)
{
	die("Could not connect to database ($dbname): ".$error->getMessage());
}

define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/myfolder/mystoryz');
define('ROOT_PATH', realpath(dirname(__FILE__)));
?>