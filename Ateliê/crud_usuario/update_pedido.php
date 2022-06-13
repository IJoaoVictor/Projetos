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

        $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "UPDATE infobolo SET nome=?, foto_pedido=?,  email=?, telefone=?, zap=?, msg1=?, msg2=?, msg3=?, msg4=?, msg5=? WHERE id=?");        
        if ($stmt_prepared_okay) {
            mysqli_stmt_bind_param($stmt, "ssssssssssi", $nome, $foto_pedido, $email, $telefone, $zap, $msg1, $msg2, $msg3, $msg4, $msg5, $id);    
            
            $foto_pedido = $file_name; 
            $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
            $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
            $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
            $zap = mysqli_real_escape_string($conn, $_REQUEST['zap']);
            $msg1 = mysqli_real_escape_string($conn, $_REQUEST['msg1']);
            $msg2 = mysqli_real_escape_string($conn, $_REQUEST['msg2']);
            $msg3 = mysqli_real_escape_string($conn, $_REQUEST['msg3']);
            $msg4 = mysqli_real_escape_string($conn, $_REQUEST['msg4']);
            $msg5 = mysqli_real_escape_string($conn, $_REQUEST['msg5']);
            $id = $_COOKIE['ID'];
      
            $stmt_executed_okay = mysqli_stmt_execute($stmt);

        if ($stmt_executed_okay) {
          
          $sql = "SELECT * FROM infobolo WHERE id = '$id'";
          
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
              $id=$row["id"];
            
            echo '<div class="center_images">';
 
      		echo '<h2> Imagem de refêrencia enviada </h2><br><br>';
      		echo "<img src= envios/" . $file_name . " width='400' height='350'><br><br>";
      
  	  		echo '<label> Nome: '.$row["nome"].'</label><br>';
  	  		echo '<label> E-mail: '.$row["email"].'</label><br>';
  	  		echo '<label> Telefone: '.$row["telefone"].'</label><br>';
  	  		echo '<label> WhatsApp: '.$row["zap"].'</label><br>';
  	  		echo '<label> Status do seu pedido: '.$row["status_pedido"].'</label><br><br>';
      
      		//Observações
      
            echo "<h2>Suas Mensagens</h2><br>";
      		echo '<label> O que o cliente gostou no pedido: <br> '.$row["msg1"].'<br></label><br>';
      		echo '<label> O que o cliente gostaria de mudar no item: <br> '.$row["msg2"].'<br></label><br>';
      		echo '<label> O tema que o cliente deseja no item: <br> '.$row["msg3"].'<br></label><br>';
      		echo '<label> Descrição do que o cliente quer no topo: <br> '.$row["msg4"].'<br></label><br>';
      		echo '<label> Demais observações do cliente: <br> '.$row["msg5"].'<br></label><br>';
            
            echo "</div>";}
        
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

        $stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "UPDATE infobolo SET nome=?,  email=?, telefone=?, zap=?, msg1=?, msg2=?, msg3=?, msg4=?, msg5=? WHERE id=?");        
        if ($stmt_prepared_okay) {
            mysqli_stmt_bind_param($stmt, "sssssssssi", $nome, $email, $telefone, $zap, $msg1, $msg2, $msg3, $msg4, $msg5, $id);    
            
            $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
            $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
            $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
            $zap = mysqli_real_escape_string($conn, $_REQUEST['zap']);
            $msg1 = mysqli_real_escape_string($conn, $_REQUEST['msg1']);
            $msg2 = mysqli_real_escape_string($conn, $_REQUEST['msg2']);
            $msg3 = mysqli_real_escape_string($conn, $_REQUEST['msg3']);
            $msg4 = mysqli_real_escape_string($conn, $_REQUEST['msg4']);
            $msg5 = mysqli_real_escape_string($conn, $_REQUEST['msg5']);
            $id = $_COOKIE['ID'];
      
            $stmt_executed_okay = mysqli_stmt_execute($stmt);

        if ($stmt_executed_okay) {
          
          $sql = "SELECT * FROM infobolo WHERE id = '$id'";
          
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
              $id=$row["id"];
            
            echo '<div class="center_images">';
 
      		echo '<h2> Pedido atualizado! </h2><br><br>';

  	  		echo '<label> Nome: '.$row["nome"].'</label><br>';
  	  		echo '<label> E-mail: '.$row["email"].'</label><br>';
  	  		echo '<label> Telefone: '.$row["telefone"].'</label><br>';
  	  		echo '<label> WhatsApp: '.$row["zap"].'</label><br>';
  	  		echo '<label> Status do seu pedido: '.$row["status_pedido"].'</label><br><br>';
      
      		//Observações
      
            echo "<h2>Suas Mensagens</h2><br>";
      		echo '<label> O que o cliente gostou no pedido: <br> '.$row["msg1"].'<br></label><br>';
      		echo '<label> O que o cliente gostaria de mudar no item: <br> '.$row["msg2"].'<br></label><br>';
      		echo '<label> O tema que o cliente deseja no item: <br> '.$row["msg3"].'<br></label><br>';
      		echo '<label> Descrição do que o cliente quer no topo: <br> '.$row["msg4"].'<br></label><br>';
      		echo '<label> Demais observações do cliente: <br> '.$row["msg5"].'<br></label><br>';
            
            echo "</div>";}
        
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