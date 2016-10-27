<?php 
	if(!isset($_GET['valor'])) die('fail');
	include('conexao.php');

	$stmt = $conn->prepare('INSERT INTO tempLog (quant_pessoas) VALUES ( :valor)');
	$stmt->bindParam(':quant_pessoas', $_GET['valor'], PDO::PARAM_INT);
	$stmt->execute();

	echo "ok";
