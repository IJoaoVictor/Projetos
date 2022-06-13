<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Detalhes do pedido</title>
</head>
<body>
<div class = "center_images">
  <h1>Dados do pedido</h1><br>
</div>
<?php

    include 'connect.php';
  
  	// Obtendo o valor do ID pesquisado
  
    $id = $_POST["id_pedido"];
          	
  	// Criando cookie que irá conter o ID selecionado para ser lido em update_pedido.php 
  	$nome = "ID";
  	$valor = $id;
	$expira = time() + 3600;
	setcookie($nome, $valor, $expira);
  
  	// Exibindo as informações do pedido realizado

    $sql = "SELECT id, nome, email, telefone, zap, msg1, msg2, msg3, msg4, msg5, foto_pedido, status_pedido, id_item FROM infobolo WHERE id=$id";
  	$result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) == 0) {
    echo '<div class="center_images">';
    echo "<h1>Não há nenhum pedido registrado com esse ID</h1><br>";
    echo '<form action="search_pedido.php" method="post" enctype="multipart/form-data">';
    echo '<button type="submit" formaction="search_pedido.php" class = "button" > Retornar </button>';
    echo '<button type="submit" formaction="index.html" class = "button"> Início </button><br>';
    echo '</div>';
    exit;}
    
    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="center_images">';
      
      if ($row["foto_pedido"] == "Nenhuma foto foi enviada"){
        echo '<h2> Nenhuma foto de referência foi enviada <br></h2><br>';
      
      } else {
        echo '<label> Imagem de refêrencia </label><br><br>';
        echo "<img src= https://atvpwb.x10.mx/atl/crud_usuario/envios/" . $row["foto_pedido"] . " width='400' height='350'><br><br>";}
      
  	  echo '<label> Nome: '.$row["nome"].'</label><br>';
  	  echo '<label> E-mail: '.$row["email"].'</label><br>';
  	  echo '<label> Telefone: '.$row["telefone"].'</label><br>';
  	  echo '<label> WhatsApp: '.$row["zap"].'</label><br>';
  	  echo '<label> Status do seu pedido: '.$row["status_pedido"].'</label><br><br>';
      
      //Observações
      echo "<h2>Suas mensagens</h2><br>";
      echo '<label> O que o cliente gostou no pedido: <br> '.$row["msg1"].'<br></label><br>';
      echo '<label> O que o cliente gostaria de mudar no item: <br> '.$row["msg2"].'<br></label><br>';
      echo '<label> O tema que o cliente deseja no item: <br> '.$row["msg3"].'<br></label><br>';
      echo '<label> Descrição do que o cliente quer no topo: <br> '.$row["msg4"].'<br></label><br>';
      echo '<label> Demais observações do cliente: <br> '.$row["msg5"].'<br></label><br>';
      
      echo "<a href=delete.php?id=$id> <button class = 'button' > Deletar pedido </button></a><br><br>";
      echo '</div>';
    }
?>
<form action="update_pedido.php" action="select_categoria.php" method="post" enctype="multipart/form-data">
    
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
      
      	<button type="submit" formaction="update_pedido.php" class = "button">Atualizar pedido</button><br><br>
    
<div class = "center_images">
    <button type="submit" formaction="search_pedido.php" class = "button">Retornar</button>
    <button type="submit" formaction="index.html" class = "button">Início</button><br>
</div>
</form>
</body>
</html>