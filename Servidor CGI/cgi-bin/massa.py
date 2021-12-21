#!/usr/bin/env python3

import cgitb, cgi
cgitb.enable()

form = cgi.FieldStorage()

medida = float(form.getvalue("medida"))

option1 = form.getvalue("option1")
option2 = form.getvalue("option2")

#Geral
if (option1 == "miligrama(s)" and option2 == "miligrama(s)") or (option1 == "gramas(s)" and option2 == "gramas(s)") or (option1 == "quilograma(s)" and option1 == "quilograma(s)"):
  result = medida

#Miligrama

elif option1 == "miligrama(s)" and option2 == "gramas(s)": 
  result = medida / 1000

elif option1 == "miligrama(s)" and option2 == "quilograma(s)": 
  result = medida / 1000000

#Grama
if option1 == "gramas(s)" and option2 == "miligrama(s)": 
  result = medida * 1000

elif option1 == "gramas(s)" and option2 == "quilograma(s)": 
  result = medida / 1000

#Quilograma
if option1 == "quilograma(s)" and option2 == "miligrama(s)": 
  result = medida * 1000000

elif option1 == "quilograma(s)" and option2 == "gramas(s)": 
  result = medida * 1000

print("Content-type:text/html\r\n\r\n")
print("""

<html>
  <head>
    <style type = "text/css">
       
       body
       {background-color: #20202C}

       .btn
       {border: 5px solid #FFFF00;
       text-align: center;
       border: 0px;
       position: relative;
       top: 10px;
       left: 0px;}
       
       h1
       {color: #FFFFFF;
       font-weight: bold;
       text-align: center;
       border: 0px;
       font-family: Manrope;}

       h2
       {color: #7959F4;
       font-weight: bold;
       text-align: center;
       border: 0px;
       font-family: Manrope;}
       
       button:hover{border: 2px solid #7959F4;}
       
      .button
      {background-color: #7959F4;
      border: none;
      color: white;
      padding: 15px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 8px;}
       
    </style>

    <link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    
    <title>Conversor</title>
  </head>
<body>
""")
print("<h1>Massa convertida</h1><hr>")
print("<h2>{} {} é equivalente a {} {}</h2>" .format(medida, option1, result, option2))
print("""
  <div class="btn">
    <button class = "button" type="button" onclick="history.go(-1)">Retornar</button>
    </div>
  <div class="btn">
    <button class = "button" type="button" onclick="history.go(-2)">Início</button>
  </div>
""")
print("</body>")
print("</html>")