<!DOCTYPE html>
<html>
<body>

<?php
session_start();

// initializar variables
$username = "";
$email    = "";
$errors = array(); 

// conexion a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'topclass');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT id, username, email, img FROM users";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Datos de salida de cada fila
    while($row = $result->fetch_assoc()) {
        print "<br> id: ". $row["id"]. "<br> - Name: ". $row["username"]. "<br> - Email: " . $row["email"] . "<br>";
      print "<img src=\"".$row["img"]."\">";
     
    }
} else {
    print "0 results";
}

$db->close();   
        ?> 
</body>
</html>