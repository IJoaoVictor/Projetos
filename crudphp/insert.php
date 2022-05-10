<html>
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title>Resumo do pedido</title>
</head>
<body>
<h1>Resumo do Pedido</h1>
<?php

include 'connect.php';

if($_POST['tipobolo'] == "Bolo de morango"){
  $msg = '<img src = "https://img.elo7.com.br/product/original/30B68A0/bolo-de-morango-bolo-suspiro-de-morango.jpg" width = "200" height = "200"><br>';
}

else if($_POST['tipobolo'] == "Bolo de limão"){
  $msg = '<img src = "https://receitasdetudo.blog.br/wp-content/uploads/2021/02/receita-de-bolo-de-limao-fofinho.jpg" width = "200" height = "200"><br>';
}
  
else if($_POST['tipobolo'] == "Bolo de chocolate"){
  $msg = '<img src = "https://pilotandofogao.com.br/wp-content/uploads/2020/06/Bolo-De-Chocolate.jpg" width = "200" height = "200"><br>';
}

$stmt = mysqli_stmt_init($conn);

$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO infobolo (nome, email, telefone, mensagem, tipobolo) VALUES (?, ?, ?, ?, ?)");   

if ($stmt_prepared_okay) {

    mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $telefone, $mensagem, $tipobolo);    

    $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
    $mensagem = mysqli_real_escape_string($conn, $_REQUEST['mensagem']);
  	$tipobolo = mysqli_real_escape_string($conn, $_REQUEST['tipobolo']);

    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
       echo '<div class = center>';	
	   echo '<label>Seu pedido foi gravado em nossa base. Em breve entraremos em contato. Obrigado! </label><br>';
       echo '</div>';
    } else {
        echo '<div class = center>';	
        echo '<label>Não foi possível finalizar o seu pedido </label><br>' . mysqli_error($conn);
        echo '</div>';
        exit;
    }
      mysqli_stmt_close($stmt);
}

$last_id = mysqli_insert_id($conn);

$sql = "SELECT * FROM infobolo WHERE id = '$last_id'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
	$id=$row["id"];
    echo '<div class="center">';
  	echo '<br>' . $msg . '<br>';
    echo '<label> Seu nome: '.$row["nome"].'</label><br>';
    echo '<label> Seu elefone: '.$row["telefone"].'</label><br>';
    echo '<label> Seu e-mail: '.$row["email"].'</label><br>';
  	echo '<label> Bolo escolhido: '.$row["tipobolo"].'</label><br>';
    echo '<label> Seu recado: '.$row["mensagem"].'</label><br>';
    echo '</div>';
}
?>
<form action="index.php" method="post">
<div class = "center">
    <p>
    <button type="submit" formaction="index.php" class = "button">Início</button>
    </p>
</div>
</form>
</body>
</html>