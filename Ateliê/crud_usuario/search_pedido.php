<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Pesquisa do pedido</title>
</head>
<body>
<?php

echo '<form action="update_pedido.php" method="post" enctype="multipart/form-data">';
    
    echo '<div class = "center_button">';
      echo '<h1> Atualização de pedido </h1>';
    echo '</div><br>';
    
    echo '<div class = "center_button">';
      
      echo '<h2> Digite o ID do seu pedido para realizar a busca </h2><br>';

        echo '<label> ID do pedido </label><br><br>';
        echo '<input type="text" name="id_pedido" id="id_pedido" placeholder = "Digite"><br><br>';
          
        echo '<button type="submit" formaction="update_pedido_info.php" class = "button">Pesquisar</button><br><br>';
?>   
<div class = "center_images">
    <button type="submit" formaction="index.html" class = "button">Início</button><br>
</div>
</form>
</body>
</html>