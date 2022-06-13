<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Detalhes do pedido</title>
</head>
<body>

<?php

    include 'connect.php';
  
  	// Obtendo o valor do ID que foi enviado pela URL
  	$id = $_GET["id"];
  	
  	// Criando um cookie que irá conter o ID selecionado para ser lido em upload_pedido.php 
  	$nome = "ID";
  	$valor = $_GET["id"];
	$expira = time() + 3600;
	setcookie($nome, $valor, $expira);
  
  	// Exibindo as informações do item escolhido

    $sql = "SELECT id, nome_foto, nome, descricao, categoria, valor, num_fatias, data_inclusao FROM bolo WHERE id=$id";
  	$result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="center_images">';
 
	  echo "<h1> Item: " . $row["nome"] . "</h1><br>";
      
      echo "<img src= /crud_boleiro/bolos/" . $row["nome_foto"] . " width='400' height='350'><br><br>";
  	  echo '<label> Descrição do item: '.$row["descricao"].'</label><br>';
  	  echo '<label> Categoria do item: '.$row["categoria"].'</label><br>';
  	  echo '<label> Valor do item: R$'.$row["valor"].'</label><br>';
  	  echo '<label> Número de fatias do item: '.$row["num_fatias"].'</label><br>';
  	  echo '<label> Data de inclusão do item: '.$row["data_inclusao"].'</label><br><br>';
      
      echo '</div>';
    }
?>
<form action="upload_pedido.php" action="escolher_categoria.php" method="post" enctype="multipart/form-data">
    
    <div class = "center_button">
      <h1> Dados do Cliente </h1>
    </div><br>
    
    <div class = "center_button">
      
        <h3> Se for do seu desejo, você também pode nos enviar uma imagem para usarmos como referência no seu pedido</h3><br>
      	<input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <label> Seu nome </label><br><br>
        <input type="text" name="nome" id="nome" placeholder = "Digite"><br><br>
    
    	<label> Telefone </label><br><br>
        <input type="text" name="telefone" id="telefone" placeholder = "Digite"><br><br>
      
      	<label> WhatsApp </label><br><br>
        <input type="text" name="zap" id="zap" placeholder = "Digite"><br><br>
      
        <label> E-mail </label><br><br>
        <input type="text" name="email" id="email" placeholder = "Digite"><br><br>
      
      	<h2> Observações </h2><br>
            
      	<label> O quê você gostou no item? </label><br><br>
        <textarea id="msg1" name="msg1" placeholder = "Digite" rows="4" cols="50"></textarea><br><br>
      
        <label> O quê você gostaria de mudar no item? </label><br><br>
        <textarea id="msg2" name="msg2" placeholder = "Digite" rows="4" cols="50"></textarea><br><br>
        
        <label> Qual o tema do item desejado? </label><br><br>
        <textarea id="msg3" name="msg3" placeholder = "Digite" rows="4" cols="50"></textarea><br><br>
      
      	<label> Descrição do que quer no topo do bolo </label><br><br>
        <textarea id="msg4" name="msg4" placeholder = "Digite" rows="4" cols="50"></textarea><br><br>
        
        <label> Observações gerais </label><br><br>
        <textarea id="msg5" name="msg5" placeholder = "Digite" rows="4" cols="50"></textarea><br><br>
      
        <button type="submit" formaction="upload_pedido.php" class = "button">Confirmar pedido</button><br><br>
   
<div class = "center_images">
    <button type="submit" formaction="escolher_categoria.php" class = "button">Retornar</button>
    <button type="submit" formaction="index.html" class = "button">Início</button><br>
</div>
</form>
</body>
</html>