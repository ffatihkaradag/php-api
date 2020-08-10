<?php
		require('../connect.php');
		
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		
		$postsq = $pdo->prepare("SELECT * FROM posts LIMIT 10");
		$postsq->execute();
		$posts = $postsq->fetchAll(PDO::FETCH_ASSOC);
		
		echo json_encode(array(
			"response" => array(
				"code" => 200,
			),
			"posts" => $posts,
		));