<?php
session_start(); // Iniciar la sesión

$usersFile = 'users.php'; // Ruta del archivo de usuarios
$users = [];

// Cargar usuarios desde el archivo PHP si existe
if (file_exists($usersFile)) {
    include($usersFile); // Incluir el archivo PHP que contiene los usuarios
}

// Manejo del inicio de sesión
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar credenciales
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        // Regenerar el ID de sesión para prevenir fijación de sesión
        session_regenerate_id(true);
        
        $_SESSION['loggedin'] = true; // Marcar al usuario como autenticado
        $_SESSION['username'] = $username; // Almacenar el nombre de usuario
        header('Location: add.php'); // Redirigir a add.php después de iniciar sesión
        exit(); // Asegurarse de que no se ejecute más código después de la redirección
    } else {
        echo "<p>Credenciales incorrectas. Intenta de nuevo.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="submit" name="login" value="Iniciar Sesión">
    </form>
</body>
</html>
