<html>
<head>
<link rel="stylesheet" href="style.css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title>Resumo do pedido</title>
</head>
<body>
<div class = "center_images">
<h1>Resumo do Pedido</h1>
</div>

<?php

include 'connect.php';
  
// Mudando a foto do bolo que será exibido de acordo com a escolha do cliente

if($_COOKIE['Bolo'] == "Bolo de Chocolate"){
  $msg = '<img src="bolos/Bolo de Chocolate.jpg" width="400" height="350"><br>'; 
  $categoria = "Chocolate";
  $valor = "100";
}

else if($_COOKIE['Bolo'] == "Bolo de Chocolate com Morangos"){
  $msg = '<img src="bolos/Bolo de Chocolate com Morangos.jpg" width="400" height="350"><br>';
  $categoria = "Chocolate, Morango";
  $valor = "110";
}
  
else if($_COOKIE['Bolo'] == "Bolo de Chocolate com Laranja"){
  $msg = '<img src="bolos/Bolo de Chocolate com Laranja.jpg" width="400" height="350"><br>';
  $categoria = "Chocolate, Laranja";
  $valor = "120";
}

else if($_COOKIE['Bolo'] == "Bolo de Morango"){
  $msg = '<img src="bolos/Bolo de Morango.jpg" width="400" height="350"><br>';
  $categoria = "Morango";
  $valor = "80";
}
  
else if($_COOKIE['Bolo'] == "Bolo de Morango 2"){
  $msg = '<img src="bolos/Bolo de Morango 2.jpg" width="400" height="350"><br>';
  $categoria = "Morango";
  $valor = "90";
}

else if($_COOKIE['Bolo'] == "Bolo de Morango 3"){
  $msg = '<img src="bolos/Bolo de Morango 3.jpg" width="400" height="350"><br>';
  $categoria = "Morango";
  $valor = "100";
}


// Configurando automaticamente todo novo pedido com o status "Novo"

$status_pedido = "Novo";

$stmt = mysqli_stmt_init($conn);
  
// Inserindo o registro no banco de dados
  
$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO infobolo (nome, email, telefone, mensagem, tipobolo, status_pedido, num_fatias, data_pedido, categoria, valor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");   

if ($stmt_prepared_okay) {

    mysqli_stmt_bind_param($stmt, "ssssssssss", $nome, $email, $telefone, $mensagem, $tipobolo, $status_pedido, $num_fatias, $data_pedido, $categoria, $valor);    

    $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
    $mensagem = mysqli_real_escape_string($conn, $_REQUEST['mensagem']);
    $tipobolo = $_COOKIE['Bolo'];
  	$status_pedido = mysqli_real_escape_string($conn, $status_pedido);
  	
  	$data_pedido = date("d/m/Y");
  	$num_fatias = mysqli_real_escape_string($conn, $_REQUEST['num_fatias']);
  	$categoria = $categoria;
  	$valor = $valor;
    
    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
       echo '<div class = center_images>';	
       echo '<label> Seu pedido foi gravado em nossa base. Em breve entraremos em contato. Obrigado! </label><br>';
       echo '</div>';
    } else {
        echo '<div class = center_images>';	
        echo '<label> Não foi possível finalizar o seu pedido </label><br>' . mysqli_error($conn);
        echo '</div>';
        exit;
    }
      mysqli_stmt_close($stmt);
}

// Obtendo o valor do ID do último registro adiciondo 

$last_id = mysqli_insert_id($conn);
  
$nome = "ultimo_id";
$valor = $last_id;
$expira = time() + 3600;
setcookie($nome, $valor, $expira);

  
// Exibindo os dados

$sql = "SELECT * FROM infobolo WHERE id = '$last_id'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $id=$row["id"];
    echo '<div class="center_images">';
    echo '<br>' . $msg . '<br>';
  
  	echo '<label> Bolo escolhido: '.$row["tipobolo"].'</label><br>';
  	echo '<label> Preço total: R$'.$row["valor"].'</label><br>';
  	echo '<label> Número de fatias: '.$row["categoria"].'</label><br>';
  	echo '<label> Seu recado: '.$row["mensagem"].'</label><br><br>';
  	echo '<label> Data do pedido: '.$row["data_pedido"].'</label><br><br>';
    
  	echo '<label> Seu nome: '.$row["nome"].'</label><br>';
    echo '<label> Seu elefone: '.$row["telefone"].'</label><br>';
    echo '<label> Seu e-mail: '.$row["email"].'</label><br>';
    echo '<label> Seu recado: '.$row["mensagem"].'</label><br>';
    echo '</div>';
}
?>
<form action="index.html" method="post">
<div class = "center_button">
    <br><button type="submit" formaction="index.html" class = "button">Início</button>
</div>
</form>
</body>
</html>