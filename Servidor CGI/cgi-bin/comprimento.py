#!/usr/bin/env python3

import cgitb, cgi
cgitb.enable()

form = cgi.FieldStorage()

medida = float(form.getvalue("medida"))

option1 = form.getvalue("option1")
option2 = form.getvalue("option2")

#Geral
if (option1 == "centímetro(s)" and option2 == "centímetro(s)") or (option1 == "metro(s)" and option2 == "metro(s)") or (option1 == "quilômetro(s)" and option1 == "quilômetro(s)"):
  result = medida

#Centímetros
elif option1 == "centímetro(s)" and option2 == "metro(s)": 
  result = medida / 100 

elif option1 == "centímetro(s)" and option2 == "quilômetro(s)": 
  result = medida / 100000

#Metros
if option1 == "metro(s)" and option2 == "centímetro(s)": 
  result = medida * 100

elif option1 == "metro(s)" and option2 == "quilômetro(s)": 
  result = medida / 1000

#Quilômetros
if option1 == "quilômetro(s)" and option2 == "centímetro(s)": 
  result = medida * 100000

elif option1 == "quilômetro(s)" and option2 == "metro(s)": 
  result = medida * 1000

print("Content-type:text/html\r\n\r\n")
print("""

<html>
  <head>
  <link rel="stylesheet" href="style.css">
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
print("<h1>Comprimento convertido</h1><hr>")
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