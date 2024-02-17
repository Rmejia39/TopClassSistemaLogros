<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Top Class Sistema Logros</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="publicar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Estilos personalizados */
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        #ImagenP {
            text-align: center;
            margin-bottom: 20px;
        }

        #cuadroImagen {
            width: 200px; /* Tamaño reducido del cuadro de imagen */
            height: 200px;
            border: 2px dashed #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            margin-bottom: 20px;
        }

        #cuadroImagen input[type="file"] {
            display: none;
        }

        #descripcionProducto {
            text-align: center;
            margin-bottom: 20px;
        }

        #descripcionProducto textarea {
            width: 100%;
            min-height: 50px; /* Altura mínima del textarea */
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            resize: vertical; /* Permitir redimensionar verticalmente */
        }

        /* Estilos para los campos de entrada */
        div input[type="text"],
        div select {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!--Menu lateral-->
    <header class="header">

        <!-- Mensaje de notificación -->
        <div class="message" id="mensaje">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
        </div>
        <!-- Fin Mensaje de notificación -->
       
        <header>

            <form action="publish.php" method="POST" enctype="multipart/form-data">
                <div id="ImagenP">
                    <br>
                    <h1>Imagen</h1>
                    <div id="cuadroImagen">
                        <input type="file" id="imagenProducto" name="imagenProducto" accept="image/*">
                        <label for="imagenProducto" id="labelImagen">
                            <i class="fas fa-image" id="iconoImagen"></i>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="categoria">Categoría:</label>
                    <select id="categoria" name="categoria">
                        <option value="Equipo">Equipo</option>
                        <option value="Integrantes">Integrantes</option>
                        <option value="Proyectos">Proyectos</option>
                        <option value="Asignatura">Asignatura</option>
                    </select>
                </div>

                <!-- Nuevo campo para equipo -->
                <div>
                    <label for="equipo">Equipo:</label>
                    <input type="text" id="equipo" name="equipo" placeholder="Ingrese el nombre del equipo">
                </div>

                <!-- Nuevo campo para integrantes -->
                <div>
                    <label for="integrantes">Integrantes:</label>
                    <textarea id="integrantes" name="integrantes" placeholder="Ingrese los nombres de los integrantes"></textarea>
                </div>

                <!-- Nuevo campo para proyectos -->
                <div>
                    <label for="proyectos">Proyectos:</label>
                    <input type="text" id="proyectos" name="proyectos" placeholder="Ingrese el nombre del proyecto">
                </div>

                <br>

                <div id="descripcionProducto">
                    <h2>Descripción</h2><br><br>
                    <textarea id="txtDescripcion" name="descripcion" rows="6"
                        placeholder="Ingrese una descripción"></textarea>
                </div>


                <button id="realizarButton" type="submit">Publicar</button>
            </form>

        </header>
        <script src="js/image.js"></script>
    </body>
</html>
