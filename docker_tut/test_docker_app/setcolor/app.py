import os
from flask import Flask, redirect
import requests
import socket

url = 'http://' + socket.gethostbyname('test_docker_app_main_1') + ":8080"
app = Flask(__name__)


@app.route("/")
def default():
    with open('/tmp/data/color.tmp', 'w') as f:
        f.write('white')
    return 'Color changed to white <br><a href="http://localhost:8080">Back to home page</a>'

@app.route("/<color>")
def color(color):
    
    print(color)
    with open('/tmp/data/color.tmp', 'w') as f:
        f.write(color)
    return 'Color changed to ' + color + '<br><a href="http://localhost:8080">Back to home page</a>'

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8081)