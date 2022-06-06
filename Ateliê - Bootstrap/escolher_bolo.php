<html>
    <head>
        <title>Opções de Bolo</title>
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta nome="viewport" content="width=device-width, initial-scale=1.0, maximun-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <div class="center">
              <div class="logo"><img src="imagens/Cake World (1).png"></div>
              	<div class="menu">
                    <a href="index.html">Retornar</a></div>
            	</div>
      	</header>
      
      	    <form action="pedido.php" method="post">
        
            <div class="center">
                    <h1>Nosso catálogo de <span style="color:FFAEBC;">bolos</span></h1><br><br>
                    <p>Após escolher o bolo desejado, clique em <span style="color:FFAEBC;">Continuar</span> para prosseguir com o seu pedido</p>
            </div>
    
            <div class="card" style="width: 18rem; display: inline-block;">
        <label><img src="bolos/Bolo de Chocolate.jpg" class="card-img-top" alt="..." width="350" height="300">
        <div class="card-body">
            <h4 class="card-title">Bolo de Chocolate</h4>
            <p class="card-text">Delicioso bolo confeitado com cobertura de chocolate ao leite derretido e recheio de sabor brigadeiro.</p>                 
            <p> Preço: R$100 </p>
            <p> Categoria(s): Chocolate </p>
            <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de Chocolate"></label>
        </div>
    </div>
    <div class="card" style="width: 18rem; display: inline-block;">
        <label><img src="bolos/Bolo de Chocolate com Morangos.jpg" class="card-img-top" alt="..." width="350" height="300">
        <div class="card-body">
            <h4 class="card-title">Bolo de Chocolate com Morango</h4>
            <p class="card-text">Apetitoso bolo de chocolate com cobertura cremosa de chocolate e decorado com morangos inteiros. Além da massa feita com beterraba e recheio de mousse de morango.</p>                 
            <p> Preço: R$110 </p>
            <p> Categoria(s): Chocolate, Morango </p>
            <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de Chocolate com Morangos"></label> 
        </div>
    </div>
    <div class="card" style="width: 18rem; display: inline-block;">
        <label><img src="bolos/Bolo de Chocolate com Laranja.jpg" class="card-img-top" alt="..." width="350" height="300">
        <div class="card-body">
            <h4 class="card-title">Bolo de Chocolate com Laranja</h4>
            <p class="card-text">Saboroso bolo de chocolate com cobertura de chocolate amargo, massa com sabor laranja e recheio de sabor abacaxi. Aos alérgicos : sem glúten, sem lactose.</p>                 
            <p> Preço: R$120 </p>
            <p> Categoria(s): Chocolate, Laranja </p>
            <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de Chocolate com Laranja"></label> 
        </div>
    </div>
    <div class="card" style="width: 18rem; display: inline-block;">
        <label><img src="bolos/Bolo de Morango.jpg" class="card-img-top" alt="..." width="350" height="300">
        <div class="card-body">
            <h4 class="card-title">Bolo de Morango</h4>
            <p class="card-text">Torta Doce tamanho pequeno (7 pessoas) com cobertura de glacê decorada com morangos fatiados e recheio sabor morango.</p>                 
            <p> Preço: R$80 </p>
            <p> Categoria(s): Morango </p>
            <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de Morango"></label> 
        </div>
    </div>
    <div class="card" style="width: 18rem; display: inline-block;">
        <label><img src="bolos/Bolo de Morango 2.jpg" class="card-img-top" alt="..." width="350" height="300">
        <div class="card-body">
            <h4 class="card-title">Bolo de Morango 2</h4>
            <p class="card-text">Torta Doce tamanho médio (15 pessoas) com cobertura de glacê decorada com morangos fatiados e recheio sabor morango.</p>                 
            <p> Preço: R$90 </p>
            <p> Categoria(s): Morango </p>
            <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de Morango 2"></label> 
        </div>
    </div>
    <div class="card" style="width: 18rem; display: inline-block;">
        <label><img src="bolos/Bolo de Morango 3.jpg" class="card-img-top" alt="..." width="350" height="300">
        <div class="card-body">
            <h4 class="card-title">Bolo de Morango 3</h4>
            <p class="card-text">Torta Doce tamanho grande (20 pessoas) com cobertura de glacê decorada com folhas de hortelã e frutas fatiadas (morangos e bananas) com massa macia e recheios sabores doce de leite e morango.</p>                 
            <p> Preço: R$100 </p>
            <p> Categoria(s): Morango </p>
            <input type="radio" name="tipobolo" name="tipobolo" value="Bolo de Morango 3"></label> 
        </div>
    </div>
 
        <br><div class = "center_button">
            <button type="submit" formaction="pedido.php" class = "button">Continuar</button>
            </div><br>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>