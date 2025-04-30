<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cateringdb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexion.
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (!isset($_POST["correo"])) {
        exit;
    }
    $email = $_POST["correo"];

    // Validar que el correo esta registrado.
    $sql = "SELECT `PasswordHash` FROM `Usuarios` WHERE Email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) { // No retorna resultados para el email especificado.
        $url = "login.php?error=email";
        echo "
        <script>
            window.location.href = \"$url\";
        </script>
        ";
        exit;
    }
    // Validar que la contraseña es la correcta.
    $entered_password = $_POST["password"];
    $stored_hash = $result->fetch_assoc()["PasswordHash"];
    if (!password_verify($entered_password, $stored_hash)) {
        $url = "login.php?error=password&correo=$email";
        echo "
        <script>
            window.location.href = \"$url\";
        </script>
        ";
        exit;
    } else {
        // Validar que el usuario se encuentra Cb_UsuarioActivo en el sistema.
        $sql = "SELECT `Cb_UsuarioActivo` FROM `Usuarios` WHERE Email = '$email'";
        $result = $conn->query($sql);
        $Cb_UsuarioActivo = $result->fetch_assoc()["Cb_UsuarioActivo"];
        // Si el usuario no se encuentra Cb_UsuarioActivo, terminar e informar del error.
        if (!$Cb_UsuarioActivo) {
            $url = "login.php?error=noauth";
            echo "
            <script>
                window.location.href = \"$url\";
            </script>
            ";
            exit;
        }
        // Usuario validado; crear cookie de sesion activa con los datos del usuario. 
        $sql = "SELECT * FROM `Usuarios` WHERE `Email` = '$email'";
        $result = $conn->query($sql);
        $user_data = $result->fetch_assoc();
        $userid = $user_data["Id_Usuario"];
        $Id_TipoUsuario = $user_data["Id_TipoUsuario"];
        $nombre = $user_data["Nombre"];
        // Crear cookie con los datos del usuario autenticado.
        $data = [
            "user" => "$userid",
            "rol" => "$Id_TipoUsuario",
            "nombre" => "$nombre"
        ];
        $serializedData = serialize($data);
        setcookie("user_data", $serializedData, time() + 7200, "/");
        // Redirigir y finalizar script.
        $conn->close();
        $url = "shop.php?log=login";
        echo "
        <script>
            window.location.href = \"$url\";
        </script>
        ";
        exit;


    }
}



?>