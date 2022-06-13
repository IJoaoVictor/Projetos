<html>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title>Atualizando item</title>
<body>
<div class = "center_images">
<h1>Dados do item</h1>
</div><br>
<form action="index.html" method="post" enctype="multipart/form-data">
<?php
  
$target_dir = "bolos/"; 

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  
$file_name =  basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1; 

$documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Checa se o arquivo é uma imagem ou não, se for, o processo continua

if(isset($_POST["submit"]) and $documentFileType != "jpg" && $documentFileType != "jpeg" && $documentFileType != "png") {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "<div class = 'center'>";
    echo "<label>Erro: O arquivo não é uma imagem - " . $check["mime"] . "</label><br>";
    echo "</div>";
    $uploadOk = 1;
    
  } else {
    echo "<div class = 'center'>";
    echo "<label>Erro: O arquivo não é um documento</label><br>";
    echo "</div>";
    $uploadOk = 0;
  }
}

// Checa o tamanho do arquivo
if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5B em bytes
  echo "<div class = 'center'>";
  echo "<label>Erro: Seu arquivo é muito grande</label><br>";
  echo "</div>";
  $uploadOk = 0;
}


// Dá valor 0 a $uploadOk caso ocorra um erro 
if ($uploadOk == 0) {
  echo "<div class = 'center'>";
  echo "<label>Erro: Não foi possível concluir o upload do seu arquivo</label><br>";
  echo "</div>";
  
// Se estiver tudo ok, será feita a tentativa de upload
  
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {}

  include 'connect.php';
    
    $stmt = mysqli_stmt_init($conn);

    if (empty($file_name == false)){

        $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "UPDATE bolo SET nome_foto=?, nome=?, descricao=?, categoria=?, valor=?, num_fatias=?, data_inclusao=? WHERE id=?");   
        
        if ($stmt_prepared_okay) {

            mysqli_stmt_bind_param($stmt, "sssssssi", $nome_foto, $nome, $descricao, $categoria, $valor, $num_fatias, $data_inclusao, $id);    
            
          	$nome_foto = $file_name;  
            $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
            $descricao = mysqli_real_escape_string($conn, $_REQUEST['descricao']);
            $categoria = mysqli_real_escape_string($conn, $_REQUEST['categoria']);
            $valor = mysqli_real_escape_string($conn, $_REQUEST['valor']);
            $num_fatias = mysqli_real_escape_string($conn, $_REQUEST['num_fatias']);
            $data_inclusao = date("d/m/Y");
            $id = $_COOKIE['ID'];

            $stmt_executed_okay = mysqli_stmt_execute($stmt);
        
        if ($stmt_executed_okay) {
          
          // Exibindo os novos dados do item

          $sql = "SELECT * FROM bolo WHERE id = '$id'";
          
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
              $id=$row["id"];
            
              echo '<div class="center_images">';
            
              echo '<h2> Item atualizado </h2>';
  				
              echo "<img src= bolos/" . $file_name . " width='400' height='350'><br><br>";
  	          echo '<label> Nome do item: '.$row["nome"].'</label><br>';
  	          echo '<label> Descrição do item: '.$row["descricao"].'</label><br>';
  	          echo '<label> Categoria do item: '.$row["categoria"].'</label><br>';
  	          echo '<label> Valor do item: R$'.$row["valor"].'</label><br>';
  	          echo '<label> Número de fatias do item: '.$row["num_fatias"].'</label><br>';
  	          echo '<label> Data de inclusão do item: '.$row["data_inclusao"].'</label><br>';
                
              echo '</div>';}
        
      } else {
        echo "<div class = 'center'_images>";
        echo "Não foi possível inserir o registro no banco de dados " . mysqli_error($conn);
        echo "</div>";
        exit;
      }
    }
}}

    $stmt = mysqli_stmt_init($conn);

    if (empty($file_name == true)){

        $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "UPDATE bolo SET nome=?, descricao=?, categoria=?, valor=?, num_fatias=?, data_inclusao=? WHERE id=?");   
        
        if ($stmt_prepared_okay) {

            mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $descricao, $categoria, $valor, $num_fatias, $data_inclusao, $id);    

            $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
            $descricao = mysqli_real_escape_string($conn, $_REQUEST['descricao']);
            $categoria = mysqli_real_escape_string($conn, $_REQUEST['categoria']);
            $valor = mysqli_real_escape_string($conn, $_REQUEST['valor']);
            $num_fatias = mysqli_real_escape_string($conn, $_REQUEST['num_fatias']);
            $data_inclusao = date("d/m/Y");
            $id = $_COOKIE['ID'];

            $stmt_executed_okay = mysqli_stmt_execute($stmt);
        
        if ($stmt_executed_okay) {
          
          // Exibindo os novos dados do item

          $sql = "SELECT * FROM bolo WHERE id = '$id'";
          
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
              $id=$row["id"];
            
              echo '<div class="center_images">';
            
              echo '<h2> Item atualizado </h2>';
  				
              echo "<img src= bolos/" . $row["nome_foto"] . " width='400' height='350'><br><br>";
  	          echo '<label> Nome do item: '.$row["nome"].'</label><br>';
  	          echo '<label> Descrição do item: '.$row["descricao"].'</label><br>';
  	          echo '<label> Categoria do item: '.$row["categoria"].'</label><br>';
  	          echo '<label> Valor do item: R$'.$row["valor"].'</label><br>';
  	          echo '<label> Número de fatias do item: '.$row["num_fatias"].'</label><br>';
  	          echo '<label> Data de inclusão do item: '.$row["data_inclusao"].'</label><br>';
                
              echo '</div>';}
        
      } else {
        echo "<div class = 'center'_images>";
        echo "Não foi possível inserir o registro no banco de dados " . mysqli_error($conn);
        echo "</div>";
        exit;
      }
    }
}
      mysqli_stmt_close($stmt);
      mysqli_close($conn); 

?>
<form action="index.html" method="post">
<div class = "center_button">
    <br><button type="submit" formaction="index.html" class = "button">Início</button>
</div>
</form>
</body>
</html>