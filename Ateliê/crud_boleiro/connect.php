<?php

//Configuração para o ambiente do x10hosting

$servername = "x13.x10hosting.com";
$username = "anqreejf_dbolo";
$password = "KshwJV22566910";
$dbname = "anqreejf_joaov"; 

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Falha na Conexão: " . mysqli_connect_error());
}

if (!mysqli_select_db($conn,$dbname)) {
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}
?>