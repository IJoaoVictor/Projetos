<?php

include 'connect.php';

$stmt = mysqli_stmt_init($conn);

// Deletando o registro do pedido do banco de dados

$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "DELETE FROM infobolo WHERE id = ?");   

if ($stmt_prepared_okay) {

    mysqli_stmt_bind_param($stmt, "i", $id);    

    $id = $_GET["id"];

    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
	   echo "Pedido deletado com sucesso";
    } else {
        echo "Não foi possível deletar o pedido do banco de dados " . mysqli_error($conn);
        exit;
    }
      mysqli_stmt_close($stmt);
}

mysqli_close($conn);

$result = mysqli_query($conn, $sql);

// Retorna para a tela de escolha da categoria de pedidos para exibir

header('Location: ' . 'select_categoria_pedido.php');

?>