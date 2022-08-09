<?php
	
	//if method is GET
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		// if nothing is after weatherstation
		if($_GET['weatherstation'] == ''){
			//i get data from api table and push into the $data
			$stmt = $pdo->prepare('SELECT * FROM api');
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return;
		}
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//i get data from POST and push into the $data
		$data = json_decode(file_get_contents('php://input'));
		$stmt = $pdo->prepare('INSERT INTO api (datum, hofok, para, token) 
		VALUES (?, ?, ?, ?)');
		$stmt->execute([$data->datum, $data->hofok, $data->para, $data->token]);
		$data->ID = $pdo->lastInsertId();
		return;
	}
?>