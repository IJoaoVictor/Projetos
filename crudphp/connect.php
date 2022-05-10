<?php

//OBS: Está em dois hostings diferentes caso caia em um dos dois 

//Configuração para o ambiente do InfinityFree

//$servername = "sql308.epizy.com";
//$username = "epiz_31638275";
//$password = "1VQnVr4TLkFbV";
//$dbname = "epiz_31638275_jvictor"; 

//Configuração para o ambiente do x10hosting

$servername = "x13.x10hosting.com";
$username = "anqreejf_jvictor328172";
$password = "KshwJV22566910";
$dbname = "anqreejf_jvictor"; 

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Falha na Conexão: " . mysqli_connect_error());
}

echo '<div class = "center">';
echo "<label>Conectado com sucesso ao Banco de Dados </label><br><br>";
echo '</div>';


if (!mysqli_select_db($conn,$dbname)) {
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}
?>
