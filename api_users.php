<?php
	//If we call GET to the users, it giv us all of the user (required auth)
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$stmt = $pdo->prepare('SELECT * FROM apiusers');
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return;
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$data = json_decode(file_get_contents('php://input'));
		
		// if the email and pass correct, we have got the ID and token
		if($_GET['users'] == 'login'){
			$stmt = $pdo->prepare('SELECT ID, token FROM apiusers WHERE email = ? AND password = ?');
			$stmt->execute([$data->email, md5($data->password)]);
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!$data){
				http_response_code(401);
				die('Authorization error');
			}
			return;
		}
	}
?>