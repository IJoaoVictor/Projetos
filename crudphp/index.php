<html>
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title>Pedido</title>
</head>
<body>
  <form action="insert.php" method="post">
    <h1> Escolha o bolo que deseja encomendar </h1>
    <div class = "center">
    <label>
      	<img src = "https://img.elo7.com.br/product/original/30B68A0/bolo-de-morango-bolo-suspiro-de-morango.jpg" width = "200" height = "200"><br>
        <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de morango">Bolo de morango</label><br><br>
    <label>
      	<img src = "https://pilotandofogao.com.br/wp-content/uploads/2020/06/Bolo-De-Chocolate.jpg" width = "200" height = "200"><br>
        <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de chocolate">Bolo de chocolate</label><br><br>
    <label>
      	<img src = "https://receitasdetudo.blog.br/wp-content/uploads/2021/02/receita-de-bolo-de-limao-fofinho.jpg" width = "200" height = "200"><br>
        <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de limão">Bolo de limão</label><br><br>


  <h1> Dados do cliente </h1>
    <p>
    	<label>Qual o seu nome?</label><br>
        <input type="text" name="nome" id="nome" placeholder = "Digite">
    </p>
    <p>
    	<label>E-mail para contato</label><br>
        <input type="text" name="email" id="email" placeholder = "Digite">
    </p>
    <p>
    	<label>Telefone para contato</label><br>
        <input type="text" name="telefone" id="telefone" placeholder = "Digite">
    </p>
    <p>
    	<label>Observações</label><br>
        <input type="text" name="mensagem" id="mensagem" placeholder = "Escreva">
    </p>
    <p>
    <button type="submit" formaction="insert.php" class = "button">Enviar pedido</button>
    </p>
</div>

</form>
</body>
</html>