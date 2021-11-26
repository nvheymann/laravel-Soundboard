import flask
from playsound import playsound
from flask import request, jsonify

app = flask.Flask(__name__)
app.config["DEBUG"] = True


# A route to return all of the available entries in our catalog.
@app.route('/api/play/sound/<sound>', methods=['GET'])
def api_all(sound):
    playsound("/home/nico/Desktop/Raspberry-Soundboard/public/sound/"+sound)
    return jsonify({'statuscode': '200'})


app.run()
