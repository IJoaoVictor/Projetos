<html>
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<?php
  
include 'connect.php';

$stmt = mysqli_stmt_init($conn);

$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "UPDATE infobolo SET status_pedido = ? WHERE id=?");   

if ($stmt_prepared_okay) {

    mysqli_stmt_bind_param($stmt, "si", $status_pedido, $id);
    
  	// Utilizando o Cookie criado e coletando o valor do status escolhido na página anterior 
  
  	$id = $_COOKIE['ID'];
  	$status_pedido = $_POST["status_pedido"];
  
    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
	   echo "Registro atualizado com sucesso";
    } else {
        echo "Não foi possível atualizar o registro no banco de dados " . mysqli_error($conn);
        exit;
    }
      mysqli_stmt_close($stmt);
}

mysqli_close($conn);

header('Location: ' . 'select_categoria_pedido.php');

?>