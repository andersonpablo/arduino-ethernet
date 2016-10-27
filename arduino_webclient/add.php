<?php 
	if(!isset($_GET['sensor1']) || !isset($_GET['sensor2']) || !isset($_GET['pessoas'])) die('fail');
	include('conexao.php');

	$stmt = $conn->prepare('INSERT INTO logs (sensor1, sensor2, pessoas) VALUES ( :sensor1, :sensor2, :pessoas)');
	$stmt->bindParam(':sensor1', $_GET['sensor1'], PDO::PARAM_INT);
	$stmt->bindParam(':sensor2', $_GET['sensor2'], PDO::PARAM_INT);
	$stmt->bindParam(':pessoas', $_GET['pessoas'], PDO::PARAM_INT);
	$stmt->execute();

	echo "ok";