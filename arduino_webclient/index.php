<?php include('conexao.php'); ?>
<html>
   <head>
      <title>Sensor Data</title>
      <meta http-equiv="refresh" content="30">  
   </head>
<body>
   <h1>Sensor Infravermelho</h1>
    <?php                     
      $stmt = $conn->prepare('SELECT * FROM tempLog ORDER BY timeStamp');
      $stmt->execute();
      while($row = $stmt->fetch()) {
      	echo "Numero de Pessoas: {$row['quant_pessoas']} - id: {$row['id_arduino']}<br/>";
      }
    ?>
</body>
</html>
