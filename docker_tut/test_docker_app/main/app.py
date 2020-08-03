import os
from flask import Flask
import time
import sys

app = Flask(__name__)

color = os.environ.get('APP_COLOR')
with open('/tmp/data/color.tmp', 'w') as f:
        f.write(color)

@app.route("/")
def main():
    with open('/tmp/data/color.tmp', 'r') as f:
        color = f.read()
    return 'The color is ' + color


if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8080)
