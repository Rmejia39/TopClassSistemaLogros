from flask import Flask, redirect, render_template, request, flash, url_for
import mongoDB
import extras
db = 'visionDB'


app = Flask(__name__)
app.secret_key = 'darkCode'

# Mostrar pagina principal
@app.route('/')
def index():
    return render_template('Chat/chat.html')

@app.route('/inicio')
def inicio():
    return render_template('pages/index.html')

#Para abrir el formulario de crear una nueva cuenta
@app.route('/crearCuenta')
def crearCuenta():
    return render_template('pages/crearcuenta.html')

@app.route('/perfil')
def perfil():
    mongoDB.connection(db,'Usuarios')
    correoDB = mongoDB.showUser('correo',correo)
    usernameDB = mongoDB.showUser('correo',correo)
    correouser = correoDB['correo']
    username = usernameDB['nombre']
    
    return render_template('pages/perfil.html', correouser = correouser, username = username)

@app.route('/predicciones')
def predicciones():
    return render_template('pages/predict.html')

#Para crear una nueva cuenta
@app.route('/crearUsuario', methods=['GET', 'POST'])
def crearUsuario():
    nombreCompleto = str(request.form['txtNombreCompleto'])
    correo = str(request.form['txtCorreo'])
    contra = str(request.form['txtContra'])
    contraConfir = str(request.form['txtConfirContra'])
    
    if extras.verificar_correo(correo) != True:
        flash('Correo invalido')
        return redirect(url_for('crearCuenta'))
    elif extras.verificar_contra(contra) != True:
        flash('Constraseña invalida')
        return redirect(url_for('crearCuenta'))
    elif contra != contraConfir:
        flash('Contraseñas no coinciden')
        return redirect(url_for('crearCuenta'))
    else:
        user = {'nombreCompleto':nombreCompleto, 'correo':correo, 'contra':contra}
        mongoDB.connection('topClass','Users')  
        mongoDB.save(user)
        flash('Usuario creado')
        return index()
    return None

@app.route('/about')
def about():
    return render_template('pages/about.html')

# #Cerramos sesion:
# @app.route('/salirSesion')
# def salirSesion():
#     return index()


#Para iniciar sesion
@app.route('/iniciarSesion', methods=['GET', 'POST'])
def iniciarSesion():
    global correo
    correo = request.form['txtCorreo']
    contra = request.form['txtContra']
    mongoDB.connection('topClass','Users')
    #Obtenemos los datos de contra
    contraDB = mongoDB.showUser('correo',correo)
    #Obtenemos los datos de correo
    correoDB = mongoDB.showUser('correo', correo)
    
    if contraDB != None and contraDB != None:    
        contrauser = contraDB['contra']
        correouser = correoDB['correo']
        if contra != contrauser or correo != correouser:
            flash('Contraseña incorrecta')
            return index()
        else:
            return about()
    else:
        flash('el usuario no existe')
        return index()
    
    pass


if __name__ == '__main__':
    app.run(debug=True)