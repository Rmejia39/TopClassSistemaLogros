<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida Docente</title>
</head>
<body>
    <h1>Bienvenido Docente</h1>
    <?php
    // Aquí puedes personalizar el mensaje de bienvenida según el nombre del docente
    $nombreDocente = "Nombre del Docente"; // Puedes obtener este valor de tu base de datos o de algún formulario
    echo "<p>¡Bienvenido, $nombreDocente! Gracias por acceder al sistema.</p>";
    ?>

    <!-- Botón para redirigir a la página publicar.php -->
    <form action="publicar.php" method="GET">
        <button type="submit">Ir a Publicar</button>
    </form>
</body>
</html>
