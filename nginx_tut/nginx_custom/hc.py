from flask import Flask

app = Flask(__name__)

@app.route('/')
def hc():
    return "OK\n"

if __name__ == "__main__":
    app.run('0.0.0.0', 81)
