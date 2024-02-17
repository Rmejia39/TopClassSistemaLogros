<?php
$imagenProducto = $_FILES['imagenProducto']['tmp_name'];
$descripcion = $_POST['descripcion'];

if (empty($imagenProducto) || empty($descripcion)) {
    header("Location: publicar.php?error=empty");
    exit();
}

$imagenBase64 = base64_encode(file_get_contents($imagenProducto));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "topclass";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$sql = "INSERT INTO publicaciones (imagen, descripcion) VALUES ('$imagenBase64', '$descripcion')";

if ($conn->query($sql) === true) {
    header("Location:Estudiante.html");
    header("Location:Evaluador.html");
} else {
    echo "Error al guardar los datos: " . $conn->error;
    header("Location:publicar.php");
}

// Cerrar la conexión
$conn->close();
?>