<?php
//allow all options require pl: GET
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
	return true;
}

// list resources what need no authenticatio
$noAuthResources = [
	'GET' => ['weatherstation'],
	'POST' => ['users=login'],
	'PATCH' => [],
	'DELETE' => []
];

// if $noAurhResources includs the called request_method
if(in_array($_SERVER['QUERY_STRING'], $noAuthResources[$_SERVER['REQUEST_METHOD']])){
	return true;
}

// check token
$token = isset(apache_request_headers()['Token']) ? apache_request_headers()['Token'] : null;
$stmt = $pdo->prepare('SELECT ID FROM apiusers WHERE token = ?');
$stmt->execute([$token]);
if($stmt->fetch(PDO::FETCH_ASSOC)){
	return true;
}

http_response_code(401);
die('Authorization error');
?>