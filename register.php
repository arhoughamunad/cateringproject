<?php

include 'header.php';
echo '<div class="main-container">';


// Gestion de sesion. Si es usuario administrador, ajustar formulario para registro de Usuarios comerciales.
if (isset($_COOKIE['user_data'])) {
    // Deserialize the cookie value
    $deserializedData = unserialize($_COOKIE['user_data']);
    $user_name = $deserializedData['nombre'];
    $user_role = $deserializedData['rol'];
    $user_id = $deserializedData['user'];

    if ($user_role == 2 || $user_role == 3 || $user_role == 4 || $user_role == 5) {
        echo "No tienes acceso para ver esta página.";
        echo "<br>";
        // echo $user_role;
        exit;
    }
    $adminlogged = false;
    if ($user_role == 1) {
        $adminlogged = true;
    }
}

$action = "registerhandler.php";
// Pre-filling por redireccion.
$nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '';
$correo = isset($_GET['correo']) ? htmlspecialchars($_GET['correo']) : '';
$telefono = isset($_GET['telefono']) ? htmlspecialchars($_GET['telefono']) : '';
$direccion = isset($_GET['direccion']) ? htmlspecialchars($_GET['direccion']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php
     $registertitle = "Registrarse";
     $welcometitle = "<h1>Regístrate Ahora</h1>";
    if (isset($_COOKIE["user_data"])) {
        if ($user_role == 1) { // Si el usuario esta loggeado y es el administrador.
            $welcometitle =  '<h1>Registro de Socios Comerciales</h1>'; 
            $registertitle = "Registrar Nuevo Socio";         
        } 
    }
    echo $welcometitle;

    ?>
    <form id="registerForm" action="<?php echo $action; ?>" method="POST">
        <label for="nombre">Nombre Completo*:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        <br>

        <label for="correo">Correo Electrónico*:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required>
        <br>

        <label for="telefono">Teléfono Celular<?php if (isset($adminlogged) && $adminlogged == true)
            echo '*' ?>:</label>
            <input type="tel" id="telefono" name="telefono" pattern="[3][0-9]{9}"
                title="Debe ser un número celular colombiano válido (10 dígitos, inicia con 3)"
                value="<?php echo $telefono; ?>" <?php if (isset($adminlogged) && $adminlogged == true) {
                       echo "required";
                   } ?>>
        <br>

        <label for="direccion">Dirección<?php if (isset($adminlogged) && $adminlogged == true)
            echo '*' ?>:</label>
            <textarea id="direccion" name="direccion" <?php if (isset($adminlogged) && $adminlogged == true) {
            echo "required";
        } ?>><?php echo $direccion; ?></textarea>
        <br>

        <label for="password">Contraseña*:</label>
        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Debe contener al menos 8 caracteres, incluyendo una mayúscula, una minúscula y un dígito." required>
        <br>

        <label for="confirmPassword">Confirmar Contraseña*:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <br>

        <?php if (isset($adminlogged) && $adminlogged == true): ?>
            <label for="area">Servicio:</label>
            <select id="area" name="area" required>
                <option value="1">Servicio de catering</option>
                <option value="2">Servicio de coctelería</option>
                <option value="3">Servicio de alquiler de menaje</option>
            </select>
            <br>
            <p>Registrar un socio comercial <strong>desactivará la cuenta del socio anterior</strong> y reemplazara los
                datos de inicio de sesión del área seleccionada por los del nuevo usuario registrado.</p>
        <?php endif; ?>


        <button type="submit"><?php echo $registertitle; ?></button>
    </form>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Las contraseñas no coinciden.');
                event.preventDefault(); 
            }
        });
    </script>
</body>

</html>

<?php


if (isset($_GET["error"])) {
    $errorcode = $_GET["error"];
    // echo "ERROR IS " . $errorcode;
    if ($errorcode == "password") {
        echo '
          <span class="error">Error: Las contraseñas no coinciden.</span>  
        ';
    } else if ($errorcode == "email") {
        echo '
        <span class="error">Error: El correo ya se encuentra registrado. Ingresa uno diferente.</span>  
      ';
    }
}
// else {
//     echo "not set";
// }


echo '</div>';






?>