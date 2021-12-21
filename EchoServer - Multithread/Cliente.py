# Cliente.py

import pickle
import socket
from tkinter import *

app = Tk()
app.title("Calculadora de IMC")
app.geometry("400x275")
app.config(bg = "#20202C")

Font_style = ("Manrope", 25, "bold")
FST = ("Manrope")

Label(app, text = "Calculadora de IMC", bg = "#20202C", fg = "white" , font = Font_style).place(x= 40 , y = 10)
Label(app, text = "Preencha os campos abaixo para checar seu índice de massa corporal", bg = "#20202C", fg = "#8A8FA8").place(x= 10 , y = 55)

# Coletando informações do usuário

# Peso

Label(app, text = "Peso(kg)", bg = "#20202C", fg = "#8A8FA8", font = FST).place(x= 10, y = 80)
peso = Entry(app, width = 50, bg = "#343447", fg = "#8A8FA8", borderwidth = 0)
peso.place(x = 11, y = 108)


# Altura

Label(app, text = "Altura(m)", bg = "#20202C", fg = "#8A8FA8", font = FST).place(x= 10, y = 125)
altura = Entry(app, width = 50, bg = "#343447", fg = "#8A8FA8", borderwidth = 0)
altura.place(x = 11, y = 153)

# Criando um objeto socket

def IMC():

    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Definindo host e port

    host = "127.0.0.1"
    port = 9999
    s.connect((host, port))

# Armazenando os dados coletados numa lista

    lista = [str(peso.get()), str(altura.get())]

# Serializando a lista e enviando para o Servidor

    s.send(pickle.dumps(lista))

# Deserializando a lista recebida do Servidor

    dados_servidor = s.recv(1024)
    info = pickle.loads(dados_servidor)

    imc = info[0]
    msg = info[1]

    s.close()

# Exibindo o IMC recebido do Servidor

    imc_label = Label(app, bg = "#343447", fg = "#8A8FA8", text= "IMC = %.2f" % imc).place(x = 10, y = 210)
    msg_label = Label(app,  bg = "#343447", fg = "#8A8FA8", text = msg).place(x = 10, y = 230)


imc_btn = Button(app, bg = "#343447", fg = "#8A8FA8", text = "Calcular IMC", command = IMC , borderwidth = 0).place(x = 10, y = 177)


app.mainloop()