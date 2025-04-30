<?php
include 'header.php';
echo '<div class="main-container">';
// Notificaciones.
if (isset($_GET["log"])) {
    $log = $_GET["log"];
    if ($log == "register") {
        echo '
        <div class="success">Registro exitoso. Inicia sesión ahora.</div>  
      ';
    }
}

// Gestion de sesion.
if (isset($_COOKIE['user_data'])) {
    echo "Ya has iniciado sesión.";
    exit;
}
// Pre-filling del campo de correo para redirecciones por validacion.
$correo = isset($_GET['correo']) ? htmlspecialchars($_GET['correo']) : '';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>

<body>
    <h1>Inicia Sesión Ahora</h1>
    <form id="loginForm" action="loginhandler.php" method="POST">

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required>
        <br>


        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>



        <button type="submit">Iniciar Sesión</button>
    </form>

<div class="register-invitation">
    <p>¿Aún no te encuentras registrado? <a href="register.php">Regístrate Ahora</a></p>
</div>

</body>

</html>


<?php
// Notificaciones de error por validacion.
if (isset($_GET["error"])) {
    $errorcode = $_GET["error"];
    // echo "ERROR IS " . $errorcode;
    if ($errorcode == "email") {
        echo '
        <span class="error">Error: El correo no se encuentra registrado.</span>  
        <script>
            document.getElementById("correo").focus();
        </script>
      ';
    } 
    else if ($errorcode == "password") {
        echo '
        <span class="error">Error: La contraseña ingresada no es la correcta.</span>  
        <script>
            document.getElementById("password").focus();
        </script>
      ';
    }
    else if ($errorcode == "noauth") {
        echo '
        <span class="error">Error: El usuario ya no hace parte del sitio.</span>  
      ';
    }
}




echo '</div>';


?>