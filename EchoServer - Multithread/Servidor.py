# Servidor.py

# Criando um objeto socket

import pickle
import socket
import threading
import time

def imc_thread(clientsocket, addr):

    hora = time.ctime((time.time()))
    print("Conexão obtida de " + str(addr) + " em " + hora)

    # Deserializando a lista recebida do Cliente

    lista = clientsocket.recv(1024)
    lista = pickle.loads(lista)

    peso = lista[0]
    altura = lista[1]

    # Calculando IMC

    IMC = float(peso) / (float(altura) ** 2)

    # Checando o resultado

    msg = ""

    if IMC < 18.5:
        msg = "Você está abaixo do peso"

    elif IMC >= 18.5 and IMC <= 24.9:
        msg = "Seu peso está normal"

    elif IMC >= 25 and IMC <= 29.9:
        msg = "Você está com sobrepeso"

    elif IMC >= 30 and IMC <= 34.9:
        msg = "Você está com Obesidade Grau 1"

    elif IMC >= 35 and IMC <= 39.9:
        msg = "Você está com Obesidade Grau 2"

    elif IMC >= 40:
        msg = "Você está com Obesidade Grau 3"

    # Armazenando os dados obtidos numa lista

    lista_servidor = [IMC, msg]

    # Serializando a lista e enviando para o Cliente

    clientsocket.send(pickle.dumps(lista_servidor))
    clientsocket.close()

ss = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
host = '127.0.0.1'
port = 9999
ss.bind((host, port))
ss.listen()

print("Servidor ativo na porta %s\n\r" % port)

while True:
    clientsocket, addr = ss.accept()
    t = threading.Thread(target=imc_thread, args=(clientsocket, addr))
    t.start()