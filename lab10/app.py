#!/bin/usr/bin/env python3

from flask import Flask, request

app = Flask(__name__)

@app.route("/", methods=["GET", "POST"])
def form():
    result = ""
    if request.method == "POST":
        name = request.form.get("name")
        result = f"<h2 class=greeting>Hello, {name}</h2>"

    return f"""
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flask Web Development</title>
        <style>
            body {{background-color: #f3e6de; margin: 10px; padding: 5px;}}
            h1 {{text-align: center;}}
            .container {{border: 7px dashed #8E4DAD; padding: 20px;}}
            h2 {{color: blue;}}
            .greeting {{color: green;}}
        </style>
    </head>
    <body>
        <h1>Welcome to My First Flask Web Page!</h1>
        <form action='/' method='post'>
            <label for='name'>Enter Name: </label>
            <input type='text' id='name' name='name'>
            <button type='submit'>Submit</button>
        </form>
        {result}
        <br>
        <div class='container'>
        <h2>How I Installed Flask</h2>
        <p>First I run commands <code>sudo apt install python3-venv, python3 -m venv flask_env, source flask_env/bin/activate </code> to create virtual environment to manage Python packages as I use VPS DigitalOcean. And then I installed Flask by running <code>pip install flask</code> in the terminal. I choose Flask because it is a lightweight web framework in Python and it's easy to implement.</p>

        <h2>Building the Page</h2>
        <p>I created a Python file called <code>app.py</code> where I defined a basic Flask app. I use Vim as editor and then I created HTML content directly in the Python code to be rendered when the app is accessed. After finishing building the web page, I use command <code>nohup pyhton3 app.py &</code> to keep the web server to run in the background</p>

        <h2>Challenges I Faced</h2>  
        <p>The code implementation wasn't a challenge for me but the research process was because the first thing I have to do is to find out how to use DigitalOcean to host website and how Flask works. I had trouble with making sure the route was properly set up initially so I watched Youtube Flask setup Tutorial and chatGPT to figure out. I figured out that I need to use Flask's <code>@app.route("/")</code> decorator to link the route to the HTML page. Also when working with Flask, one specific challenge was that I use single curly braces as usual to wrap the properties and value for CSS and it raised an error. However, later I found out that I have to use double curly braces and it worked as normal.</p>
        </div>
    </body>
    </html>
    """

app.run(host="0.0.0.0", port=8080)



