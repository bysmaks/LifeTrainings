from flask import Flask, request, render_template
import zipfile, os

app = Flask(__name__)
app.config['SECRET_KEY'] = os.urandom(32)
app.config['MAX_CONTENT_LENGTH'] = 1 * 1024 * 1024
app.config['UPLOAD_FOLDER'] = '/app/upload/'

def extract(archive):
    with zipfile.ZipFile(archive, 'r') as z:
        for i in z.infolist():
            with open(os.path.join(app.config['UPLOAD_FOLDER'], i.filename), 'wb') as f:
                f.write(z.open(i.filename, 'r').read())

@app.route('/') 
def main():
    return render_template('index.html')

@app.route('/upload', methods=['POST'])
def upload():
    try:
        if request.files and 'archive' in request.files:
            archive = request.files['archive']
            if archive \
                and '.' in archive.filename \
                and archive.filename.rsplit('.', 1)[1].lower() == 'zip':
                save_path = os.path.join(app.config['UPLOAD_FOLDER'], f'{os.urandom(16).hex()}.zip')
                archive.save(save_path)
                extract(save_path)
                return render_template('index.html', error=f'App was extracted sucsessful, we tested it and send you notification.')
        return render_template('index.html', error="Not valid zip file, try again")
    except Exception as e:
         return render_template('index.html', error=f'Error: {e}')
     
@app.route("/list")
def status():
    return render_template("list.html", status=os.listdir("/app/uploads/"))

if __name__ == '__main__':
    app.run(debug=True, port=8080, host='0.0.0.0')
