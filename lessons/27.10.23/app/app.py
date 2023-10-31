from flask import Flask, render_template, request, render_template_string

app = Flask(__name__)

@app.route("/")
def index():
    return render_template('index.html')

@app.route("/example")
def vuln():
    name = 'stranger'
    if request.args.get('name'):
        name = request.args.get('name')
    
    template = '''
<html>
  <head>
    <title>Server Side Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
    <p class="h5">Hello, %s</p>
    <form class="form-signin">
        <br>
        <input class="form-check-label" placeholder="name" type="name" name="name">
        </form>
    ''' % (name)
    return render_template_string(template)

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=8090, threaded=True)
