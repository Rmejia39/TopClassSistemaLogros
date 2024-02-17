<?php
session_start();

// initializar variables
$username = "";
$email    = "";
$errors = array(); 

// conectar a la base de datos
$db = mysqli_connect('localhost', 'root', '', 'topclass');

// registro de usuario
if (isset($_POST['reg_user'])) {
  // Recibir todos los valores de entrada del formulario
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  // Validación del formulario: asegúrese de que el formulario se rellena correctamente ...
  //  agregando (array_push()) el error correspondiente a $errors matriz
  if (empty($username)) { array_push($errors, "Usuario requerido"); }
  if (empty($email)) { array_push($errors, "Correo requerido"); }
  if (empty($password_1)) { array_push($errors, "Contraseña requerida"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Las dos contraseñas no coinciden");
  }
  

  // Primero compruebe la base de datos para asegurarse de que
  // un usuario aún no existe con el mismo nombre de usuario y/o correo electrónico
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // si el usuario existe
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "El usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "El correo ya existe");
    }
  }

  if (count($errors) == 0) {
    //encryptar la contraseña
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password ) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Registro completo";
  	header('location: principal.php');
  }
}

// LOGIN USUARIO
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Usuario requerido");
  }
  if (empty($password)) {
  	array_push($errors, "Contraseña requerido");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Inicio de sesion completo";
  	  header('location: principal.php');
  	}else {
  		array_push($errors, "Usuario incorrecto/Contraseña incorrecta");
  	}
  }
}
?>