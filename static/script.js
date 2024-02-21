function sendMessage() {
    var userInput = document.getElementById("user-input");
    var message = userInput.value;
    if (message.trim() !== "") {
      var chatBox = document.getElementById("chat-box");
      var newMessage = document.createElement("div");
      newMessage.textContent = message;
      chatBox.appendChild(newMessage);
      userInput.value = "";
      chatBox.scrollTop = chatBox.scrollHeight;
    }
  }

  
  //chat
  // app.js

const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();

// Middleware
app.use(bodyParser.json());
app.use(cors());

// Conexión a MongoDB
mongoose.connect('mongodb://localhost/topClass', { useNewUrlParser: true, useUnifiedTopology: true })
    .then(() => console.log('Conectado a MongoDB'))
    .catch(err => console.error('No se pudo conectar a MongoDB', err));

// Definición de los esquemas y modelos de Mongoose para 'teachers' y 'students'

const teacherSchema = new mongoose.Schema({
    name: String,
    // Otros campos para los profesores
});

const studentSchema = new mongoose.Schema({
    name: String,
    // Otros campos para los estudiantes
});

const Teacher = mongoose.model('Teacher', teacherSchema);
const Student = mongoose.model('Student', studentSchema);

// Rutas de la API

// Obtener todos los profesores
app.get('/api/teachers', async (req, res) => {
    try {
        const teachers = await Teacher.find();
        res.json(teachers);
    } catch (error) {
        console.error('Error al obtener los profesores:', error);
        res.status(500).send('Error interno del servidor');
    }
});

// Obtener todos los estudiantes
app.get('/api/students', async (req, res) => {
    try {
        const students = await Student.find();
        res.json(students);
    } catch (error) {
        console.error('Error al obtener los estudiantes:', error);
        res.status(500).send('Error interno del servidor');
    }
});

// Iniciar el servidor
const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Servidor escuchando en el puerto ${port}`));
