<?php include('conexao.php');

error_reporting(0);
ini_set(“display_errors”, 0);
   
   $query = "INSERT INTO tempLog (quant_pessoas, id_arduino) VALUES ('".$_GET["valor"]."','".$_GET["id_arduino"]."')"; 
   $exec = $conn->exec($query);
   
echo "adicionado com sucesso";
