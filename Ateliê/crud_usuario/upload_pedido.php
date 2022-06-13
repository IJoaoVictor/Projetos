<html>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title>Upload - Status</title>
<body>
<div class = "center_images">
</div><br>
<form action="index.html" method="post" enctype="multipart/form-data">
<?php

//Pasta criada também dentro do meu HTDOCS onde os arquivos serão salvos.
$target_dir = "envios/"; 

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

        $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO infobolo (nome, email, telefone, zap, msg1, msg2, msg3, msg4, msg5, foto_pedido, id_item, status_pedido) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");   
        
        if ($stmt_prepared_okay) {
            
            mysqli_stmt_bind_param($stmt, "ssssssssssis", $nome, $email, $telefone, $zap, $msg1, $msg2, $msg3, $msg4, $msg5, $foto_pedido, $id_item, $status_pedido);    
	  
            $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
            $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
            $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
            $zap = mysqli_real_escape_string($conn, $_REQUEST['zap']);
            $msg1 = mysqli_real_escape_string($conn, $_REQUEST['msg1']);
            $msg2 = mysqli_real_escape_string($conn, $_REQUEST['msg2']);
            $msg3 = mysqli_real_escape_string($conn, $_REQUEST['msg3']);
            $msg4 = mysqli_real_escape_string($conn, $_REQUEST['msg4']);
            $msg5 = mysqli_real_escape_string($conn, $_REQUEST['msg5']);
            $foto_pedido = $file_name;
            $status_pedido = "Novo";
            $id_item = $_COOKIE['ID'];

            $stmt_executed_okay = mysqli_stmt_execute($stmt);
      
      if ($stmt_executed_okay) {
          
          // Exibindo os dados do pedido

          $last_id = mysqli_insert_id($conn);

          $sql = "SELECT * FROM infobolo WHERE id = '$last_id'";
          
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            
              $id=$row["id"];
              echo '<div class="center_images">';
            
              echo '<h1>Seus dados</h1><br>';
            
              echo '<h2>Imagem de referência enviada</h2><br>';
              echo "<img src= envios/" . $file_name . " width='400' height='350'><br><br>";

              echo '<label> Seu nome: '.$row["nome"].'</label><br>';
              echo '<label> Seu telefone: '.$row["telefone"].'</label><br>';
              echo '<label> Seu WhatsApp: '.$row["zap"].'</label><br>';
              echo '<label> Seu E-mail: '.$row["email"].'</label><br>';

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

        $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO infobolo (nome, email, telefone, zap, msg1, msg2, msg3, msg4, msg5, foto_pedido, id_item, status_pedido) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");   
        
        if ($stmt_prepared_okay) {
            
            mysqli_stmt_bind_param($stmt, "ssssssssssis", $nome, $email, $telefone, $zap, $msg1, $msg2, $msg3, $msg4, $msg5, $foto_pedido, $id_item, $status_pedido);    
	  
            $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
            $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
            $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
            $zap = mysqli_real_escape_string($conn, $_REQUEST['zap']);
            $msg1 = mysqli_real_escape_string($conn, $_REQUEST['msg1']);
            $msg2 = mysqli_real_escape_string($conn, $_REQUEST['msg2']);
            $msg3 = mysqli_real_escape_string($conn, $_REQUEST['msg3']);
            $msg4 = mysqli_real_escape_string($conn, $_REQUEST['msg4']);
            $msg5 = mysqli_real_escape_string($conn, $_REQUEST['msg5']);
            $foto_pedido = "Nenhuma foto foi enviada";
            $status_pedido = "Novo";
            $id_item = $_COOKIE['ID'];

            $stmt_executed_okay = mysqli_stmt_execute($stmt);
      
      if ($stmt_executed_okay) {
          
          // Exibindo os dados do pedido

          $last_id = mysqli_insert_id($conn);

          $sql = "SELECT * FROM infobolo WHERE id = '$last_id'";
          
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            
              $id=$row["id"];
              echo '<div class="center_images">';
            
              echo '<h1>Seus dados</h1><br>';
            
              echo '<h2>Pedido realizado!</h2><br>';

              echo '<label> Seu nome: '.$row["nome"].'</label><br>';
              echo '<label> Seu telefone: '.$row["telefone"].'</label><br>';
              echo '<label> Seu WhatsApp: '.$row["zap"].'</label><br>';
              echo '<label> Seu E-mail: '.$row["email"].'</label><br>';

              echo '</div>';}
        
      } else {
        echo "<div class = 'center'_images>";
        echo "Não foi possível inserir o registro no banco de dados " . mysqli_error($conn);
        echo "</div>";
        exit;
      }
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