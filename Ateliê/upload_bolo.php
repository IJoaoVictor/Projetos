<html>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title>Upload - Status</title>
<body>
<div class = "center_images">
<h1>Dados do item</h1>
</div><br>
<form action="index.html" method="post" enctype="multipart/form-data">
<?php

//Pasta criada dentro do HTDOCS que conterá as fotos dos itens enviadas
  
$target_dir = "bolos/"; 

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  
$file_name =  basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1; 

$documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Checa se o arquivo é uma imagem ou não, se for, o processo continua


if(isset($_POST["submit"])) {
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

// Checa se o aquivo já existe
if (file_exists($target_file)) {
  echo "<div class = 'center'>";
  echo "<label>Erro: O arquivo já existe</label><br>";
  echo "</div>";
  $uploadOk = 0;
}

// Checa o tamanho do arquivo
if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5B em bytes
  echo "<div class = 'center'>";
  echo "<label>Erro: Seu arquivo é muito grande</label><br>";
  echo "</div>";
  $uploadOk = 0;
}

// Permissão para certos tipos de formatos de arquivos
if($documentFileType != "jpg" && $documentFileType != "jpeg" && $documentFileType != "png") {
  echo "<div class = 'center'>";
  echo "<label>Erro: Apenas o upload de arquivos com formato JPG, JPEG e PNG é permitido</label><br>";
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
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    
    include 'connect.php';
    
    $stmt = mysqli_stmt_init($conn);
    
    // Inserindo na tabela "bolo" os dados do item adicionando ao catálogo

	$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO bolo (nome_foto, nome, descricao, categoria, valor, num_fatias, data_inclusao) VALUES (?, ?, ?, ?, ?, ?, ?)");   
    
    if ($stmt_prepared_okay) {
      mysqli_stmt_bind_param($stmt, "sssssss", $nome_foto, $nome, $descricao, $categoria, $valor, $num_fatias, $data_inclusao);    
	  
      $nome_foto = $file_name;
      $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
      $descricao = mysqli_real_escape_string($conn, $_REQUEST['descricao']);
      $categoria = mysqli_real_escape_string($conn, $_REQUEST['categoria']);
      $valor = mysqli_real_escape_string($conn, $_REQUEST['valor']);
      $num_fatias = mysqli_real_escape_string($conn, $_REQUEST['num_fatias']);
      $data_inclusao = date("d/m/Y");

      $stmt_executed_okay = mysqli_stmt_execute($stmt);
      
      if ($stmt_executed_okay) {
        
          // Obtendo o valor do último ID adicionado na tabela "bolo", que é o mais recente item adicionado
        
          $last_id = mysqli_insert_id($conn);
          
          // Exibindo os dados do recém-adicionado

          $sql = "SELECT * FROM bolo WHERE id = '$last_id'";
          
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            
              $id=$row["id"];

            echo '<div class="center_images">';
  				
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
      mysqli_stmt_close($stmt);
      mysqli_close($conn); 
    }
}    

?>
<form action="index.html" method="post">
<div class = "center_button">
    <br><button type="submit" formaction="index.html" class = "button">Início</button>
</div>
</form>
</body>
</html>