document.addEventListener('DOMContentLoaded', function() {
    var currentPage = window.location.pathname.split('/').pop(); // Obtener el nombre de la página actual
    var allowedPages = ['Estudiante.html', 'Evaluador.html']; // Páginas permitidas para mostrar el chat
    
    // Verificar si la página actual está permitida
    if (allowedPages.includes(currentPage)) {
        document.getElementById('chat-button').addEventListener('click', function() {
            document.getElementById('chat-box').style.display = 'block';
        });

        document.getElementById('chat-close').addEventListener('click', function() {
            document.getElementById('chat-box').style.display = 'none';
        });

        document.getElementById('chat-send').addEventListener('click', function() {
            var message = document.getElementById('chat-input').value;
            if (message.trim() !== '') {
                var chatMessages = document.getElementById('chat-messages');
                var newMessage = document.createElement('div');
                newMessage.textContent = "Estudiante: " + message;
                newMessage.style.color = '#fff';
                newMessage.style.padding = '10px';
                newMessage.style.borderRadius = '10px';
                newMessage.style.backgroundColor = '#3498db';
                newMessage.style.marginBottom = '10px';
                chatMessages.appendChild(newMessage);
                document.getElementById('chat-input').value = '';
            }
        });
    } else {
        // Ocultar el botón de chat en otras páginas
        document.getElementById('chat-button').style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var currentPage = window.location.pathname.split('/').pop(); // Obtener el nombre de la página actual
    var allowedPages = ['Estudiante.html', 'Evaluador.html']; // Páginas permitidas para mostrar el chat
    
    // Verificar si la página actual está permitida
    if (allowedPages.includes(currentPage)) {
        // Mostrar el chat
        document.getElementById('chat-button').addEventListener('click', function() {
            document.getElementById('chat-box').style.display = 'block';
        });

        // Cerrar el chat al hacer clic en la "X"
        document.getElementById('chat-close').addEventListener('click', function() {
            document.getElementById('chat-box').style.display = 'none';
        });

        // Enviar mensaje
        document.getElementById('chat-send').addEventListener('click', function() {
            var message = document.getElementById('chat-input').value;
            if (message.trim() !== '') {
                var chatMessages = document.getElementById('chat-messages');
                var newMessage = document.createElement('div');
                newMessage.textContent = "Estudiante: " + message;
                newMessage.style.color = '#fff';
                newMessage.style.padding = '10px';
                newMessage.style.borderRadius = '10px';
                newMessage.style.backgroundColor = '#3498db';
                newMessage.style.marginBottom = '10px';
                chatMessages.appendChild(newMessage);
                document.getElementById('chat-input').value = '';
            }
        });
    } else {
        // Ocultar el botón de chat en otras páginas
        document.getElementById('chat-button').style.display = 'none';
    }
});
