import sys, bottle
from bank.client import Client
from bank.account import Account

app = application = bottle.Bottle()

@app.route('/static/css/<filename:re:.*\.css>')
def send_css(filename):
    return bottle.static_file(filename, root='static/css')

@app.route('/static/vendor/<filename:re:.*\.(css|js)>')
def send_vendor(filename):
    return bottle.static_file(filename, root='static/vendor')

defaults = {
    "client_id": 1,
    "modules" : ("profile", "account"),
    "title": "My Usine"
}

@app.route("/")
@bottle.view("index.tpl")
def index():
    return defaults

@app.route("/profile/<client_id:int>")
@bottle.view("profile.tpl")
def profile(client_id):
    context = defaults.copy()
    context["client_id"] = client_id
    context["title"] = "My Profile"
    context["client"] =  Client(client_id)
    return context

@app.route("/account/<client_id:int>")
@bottle.view("account.tpl")
def account(client_id):
    context = defaults.copy()
    context["client_id"] = client_id
    context["title"] = "My account"
    context["account"] =  Account(client_id, Client(client_id))
    return context

if __name__ == "__main__":
    bottle.run(app=app, host='172.17.0.1', port=8080, debug=True, reloader=True)