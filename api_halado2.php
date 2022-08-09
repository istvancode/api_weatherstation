<?php
use PDO;

require('./api_cors.php');	
require('./api_halado2_sec.php');

// built connection with 3 parameter
$pdo = new PDO('mysql:host=yourHostName;dbname='.$secrets['mysqlDb'], $secrets['mysqlUser'], $secrets['mysqlPass']); 

// if i'm developer giv me all error message
if($development){
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}	

// save the url part after =
$resource = strtok($_SERVER['QUERY_STRING'], '=');
require('api_auth.php');

if($resource == 'weatherstation'){
	require('api_weatherstation.php');
}

if($resource == 'users'){
	require('api_users.php');
}

echo json_encode($data);

?>