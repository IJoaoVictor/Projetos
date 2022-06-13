<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<html>
<title>Interface</title>
  <div class = "center_images">
    <h1> Informações do pedido </h1><br> 
  </div>
<body>

<?php

    include 'connect.php';
  
  	// Obtendo o valor do ID que foi enviado pela URL
  	$id = $_GET["id"];
  
  	// Criando um cookie que irá conter o ID selecionado para ser lido em update_pedido.php 
  	$nome = "ID";
  	$valor = $_GET["id"];
	$expira = time() + 3600;
	setcookie($nome, $valor, $expira);
  
    // Exibindo as informações do pedido feito pelo cliente
  
    $sql = "SELECT id, nome, email, telefone, zap, msg1, msg2, msg3, msg4, msg5, foto_pedido, status_pedido, id_item FROM infobolo WHERE $id=id";
  
  	$result = mysqli_query($conn, $sql);
  
  	if (mysqli_num_rows($result) == 0) {
    echo '<div class="center_images">';
    echo "<label>Não há nenhum pedido com esse status</label><br>";
    echo '</div>';}

    while ($row = mysqli_fetch_assoc($result)) {
            
      echo '<div class="center_images">';
      
      $id = $row["id"];
	  
      echo "<h2>Dados do pedido " . $row["id"]. "</h2><br>";
      echo '<div class="center_images">';
  	  
      // Info do cliente
  	  echo '<label> Nome: '.$row["nome"].'</label><br>';
  	  echo '<label> E-mail: '.$row["email"].'</label><br>';
  	  echo '<label> Telefone: '.$row["telefone"].'</label><br>';
  	  echo '<label> WhatsApp: '.$row["zap"].'</label><br>';
      echo '<label> Status atual: '.$row["status_pedido"].'</label><br><br>';
      
      if ($row["foto_pedido"] == "Nenhuma foto foi enviada"){
        echo '<h2> Nenhuma foto de referência foi enviada <br></h2><br>';
      } else {
        echo '<label> Imagem de refêrencia </label><br><br>';
        echo "<img src= https://atvpwb.x10.mx/atl/crud_usuario/envios/" . $row["foto_pedido"] . " width='400' height='350'><br><br>";}

      // Observações
      
      echo "<h2>Observações do cliente</h2><br>";
      echo '<label> O que o cliente gostou no pedido: <br> '.$row["msg1"].'<br></label><br>';
      echo '<label> O que o cliente gostaria de mudar no item: <br> '.$row["msg2"].'<br></label><br>';
      echo '<label> O tema que o cliente deseja no item: <br> '.$row["msg3"].'<br></label><br>';
      echo '<label> Descrição do que o cliente quer no topo: <br> '.$row["msg4"].'<br></label><br>';
      echo '<label> Demais observações do cliente: <br> '.$row["msg5"].'<br></label><br>';
      
      // Caso o boleiro queira excluir o pedido
      echo "<a href=delete_pedido.php?id=$id> <button class = 'button' > Deletar pedido </button></a>";
      
      // Exibindo as informações do item escolhido pelo cliente
      
      // Obtendo o ID do item que foi escolhido pelo cliente
      $id_item=$row["id_item"];
           
      // Exibindo as informações desse item
      $sql = "SELECT id, nome_foto, nome, descricao, categoria, valor, num_fatias, data_inclusao FROM bolo WHERE id=$id_item";

      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) == 0) {
        echo '<div class="center_images">';
        echo "<label>Não há nenhum registro no banco de dados </label><br>";
        echo '</div>';
        exit;}
    
      while ($row = mysqli_fetch_assoc($result)) {
        
        $id=$row["id"];
        
        echo '<div class="center_images">';
        echo "<br><h2>Dados do " . $row["nome"]. "</h2><br>";
  	    
        echo '<label> Descrição do item: '.$row["descricao"].'</label><br>';
  	    echo '<label> Categoria do item: '.$row["categoria"].'</label><br>';
  	    echo '<label> Valor do item: R$'.$row["valor"].'</label><br>';
  	    echo '<label> Número de fatias do item: '.$row["num_fatias"].'</label><br>';
  	    echo '<label> Data de inclusão do item: '.$row["data_inclusao"].'</label><br><br>';
        
        echo '</div>';
      } 
    } 
  
  		// Aqui o boleiro pode atualizar o status do pedido do cliente
  
  		echo '<form action="update_pedido.php" method="post">';
  
        echo '<label for="status_pedido">Alterar status do pedido para: </label><br><br>';
        	echo '<select name="status_pedido" id="status_pedido">';
        	echo '<option value="Visto">Visto</option>';
    		echo '<option value="Em atendimento">Em atendimento</option>';
    		echo '<option value="Finalizado">Finalizado</option>';
    		echo '<option value="Cancelado">Cancelado</option>';
    		echo '<option value="Lixo">Lixo</option>';
        	echo '</select>';
        	echo '<br><br>';
  		
        // Em "update_pedido.php" será atualizado o status do pedido
        echo "<button type='submit' formaction='update_pedido.php' class = 'button'>Atualizar status</button><br>";
?>
<form action="index.html" action="interface.php" method="post">
<br><div class = "center_images">
    <button type="submit" formaction="index.html" class = "button">Início</button>
    <button type="submit" formaction="select_categoria_pedido.php" class = "button">Retornar</button>
</div>
</form>
</body>
</html>