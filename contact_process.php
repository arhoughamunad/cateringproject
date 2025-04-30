<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "cateringdb";

    // Conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Recibir datos del formulario y sanitizarlos
    $nombre = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $mensaje = $conn->real_escape_string($_POST["message"]);

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        header("Location: contact.php?error=emptyfields");
        exit;
    }

    // Insertar datos en la tabla
    $sql = "INSERT INTO `Historial_Contactos` (`Nombre_Apellido`, `Email`, `Mensaje`) 
            VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        header("Location: contact.php?success=message_sent");
    } else {
        header("Location: contact.php?error=db_error");
    }

    $conn->close();
    exit;
}
?>
