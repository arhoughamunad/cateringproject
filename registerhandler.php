<?php

// Primero validar password match, correo no registrado ya. Si no es valido, redirigir con prefilling.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; // Default username
    $password = ""; // Default password is empty
    $dbname = "cateringdb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $nombre = ucwords($nombre);
    $correo = $conn->real_escape_string($_POST["correo"]);
    $correo = strtolower($correo);
    $telefono = $conn->real_escape_string($_POST["telefono"]);
    if (empty($telefono)) {
        $telefono = 'No Disponible';
    }
    $direccion = $conn->real_escape_string($_POST["direccion"]);
    if (empty($direccion)) {
        $direccion = 'No Disponible';
    }
    $user_password = $_POST["password"];

    // Primer validacion, password match.
    if ($_POST["password"] != $_POST["confirmPassword"]) {
        $url = "register.php?error=password&nombre=$nombre&correo=$correo&telefono=$telefono&direccion=$direccion";
        if (isset($_POST["area"])) {
            $url = $url . "&userid=1";
        }
        echo "
        <script>
            window.location.href = \"$url\";
        </script>
        ";
    }
    // Segunda validacion, que el email no exista ya en el sistema.
    $sql = "SELECT COUNT(*) AS Total FROM Usuarios WHERE Email = '$correo'";
    $result = $conn->query($sql);
    if ($result->fetch_assoc()["Total"] > 0) {
        $url = "register.php?error=email&nombre=$nombre&telefono=$telefono&direccion=$direccion";
        if (isset($_POST["area"])) {
            $url = $url . "&userid=1";
        }
        echo "
        <script>
            window.location.href = \"$url\";
        </script>
        ";
        exit;
    }
    // Ambas validaciones pasadas, subir datos al sistema.
    $passwordHash = password_hash($user_password, PASSWORD_DEFAULT);
    $Id_TipoUsuario = 2; // Default, el cliente es el tipo usuario por defecto.
    // Si el registro es para socio comercial, ajustar Tipo de usuario.
    if (isset($_POST["area"])) {
        $area = $_POST["area"];
        // echo "AREA IS ------> " . $area . "<br>";
        switch ($area) {
            case '1':
                $Id_TipoUsuario = 3;
                break;
            case '2':
                $Id_TipoUsuario = 4;
                break;
            case '3':
                $Id_TipoUsuario = 5;
                break;
        }

        // Desactivar el antiguo socio comercial y sus preguntas.
        $sql = "SELECT Id_Usuario FROM Usuarios WHERE Id_TipoUsuario = '$Id_TipoUsuario' && Cb_UsuarioActivo = '1';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // echo "RESULT IS RUNNING ------";
            $targetId = $result->fetch_assoc()['Id_Usuario'];
            $sql = "UPDATE Usuarios SET Cb_UsuarioActivo = '0' WHERE Usuarios.Id_Usuario = $targetId;";
            $conn->query($sql);
		}
	
    }

    $sql = "INSERT INTO Usuarios 
						(Id_TipoUsuario,
						Email, 
						PasswordHash, 
						Nombre, 
						Telefono, 
						Direccion) 
						VALUES ('$Id_TipoUsuario','$correo','$passwordHash','$nombre', '$telefono', '$direccion');";
    $result = $conn->query($sql);
	$sql = "UPDATE Preguntas_Formularios
                    SET Cb_EsHabilitada = 0
						WHERE Id_Formulario IN (
							SELECT F.Id_Formulario 
									FROM Formularios F
									INNER JOIN Tipo_Usuario TU
										ON F.Id_TipoUsuario=TU.Id_TipoUsuario
							WHERE TU.Id_TipoUsuario = $Id_TipoUsuario)";
	$conn->query($sql);

    // Una vez registrado, dirigir a Login para inicio de sesion.
    $conn->close();
    if ($Id_TipoUsuario != 2) { // Redirigir usuario administrador luego de registro de socio comercial.
        $url = "shop.php?log=register";
    }
    else {
        $url = "login.php?log=register";
    }
    echo "
    <script>
        window.location.href = \"$url\";
    </script>
    ";
    exit;

}





?>