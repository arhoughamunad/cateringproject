<?php
ob_start();
include 'header.php';
echo '<div class="main-container">';

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cateringdb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Gestion de sesión.
if (!isset($_COOKIE['user_data'])) {
    echo "No tienes acceso para ver esta página.";
    exit;
} else {
    $deserializedData = unserialize($_COOKIE['user_data']);
    $user_role = $deserializedData['rol'];
    $user_id = $deserializedData['user'];
    
    if ($user_role != 3 && $user_role != 4 && $user_role != 5) {
        echo "No tienes acceso para ver esta página.";
        exit;
    }
	$sql = "SELECT Id_Formulario FROM Formularios WHERE Id_TipoUsuario = $user_role ";
        $result = $conn->query($sql);
        $form_data = $result->fetch_assoc();
		$formId = $form_data["Id_Formulario"];
		
	$sql = "SELECT Fecha_Creacion FROM Usuarios WHERE Id_Usuario = $user_id ";
        $result = $conn->query($sql);
        $user_info = $result->fetch_assoc();
		$fechaCreacion = $user_info["Fecha_Creacion"];
}

// Procesar formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST["id_pregunta"] as $id_pregunta) {
        $es_habilitada = isset($_POST["habilitada"][$id_pregunta]) ? 1 : 0;
        
        // Actualizar cada pregunta en la base de datos
        $update_sql = "UPDATE Preguntas_Formularios SET Cb_EsHabilitada = ? WHERE Id_Pregunta = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ii", $es_habilitada, $id_pregunta);

        if (!$stmt->execute()) {
            echo "Error en la actualización: " . $stmt->error;
        }

        $stmt->close();
    }
    
    header("Location: formviewer.php?form=$formId&log=updated");
    exit;
}

		
// Obtener preguntas habilitables asociadas al usuario
$query = "SELECT Distinct PF.Id_Pregunta, 
				 PF.Desc_Pregunta, 
				 PF.Cb_EsHabilitada 
				 FROM Preguntas_Formularios PF		
				  JOIN  Formularios F 
				  ON PF.Id_Formulario=F.Id_Formulario
				  JOIN Usuarios U
				  ON U.Id_TipoUsuario=F.Id_TipoUsuario
				 WHERE PF.Id_Formulario = ? AND PF.Fecha_Pregunta >='$fechaCreacion'";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $formId); /*Entonces ? toma el valor que se asigna acá tomado desde la consulta en la línea 30*/
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Preguntas</title>
</head>
<body>
    <h1>Administrar Preguntas</h1>
    <form method="POST" action="">
        <table border="1">
            <thead>
                <tr>
                    <th>Id Pregunta</th>
                    <th>Descripción</th>
                    <th>Habilitada</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Id_Pregunta']; ?></td>
                        <td><?php echo htmlspecialchars($row['Desc_Pregunta']); ?></td>
                        <td>
                            <input type="hidden" name="id_pregunta[]" value="<?php echo $row['Id_Pregunta']; ?>">
                            <input type="checkbox" name="habilitada[<?php echo $row['Id_Pregunta']; ?>]" value="1" <?php echo ($row['Cb_EsHabilitada'] == 1) ? 'checked' : ''; ?>>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <input type="submit" class="add-send-btn" value="Actualizar">
    </form>
</body>
</html>

<?php
echo "</div>";
include 'footer.php';
ob_end_flush();
?>
