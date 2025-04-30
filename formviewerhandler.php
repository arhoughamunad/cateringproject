<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cateringdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columns = [];
    $values = [];
    foreach ($_POST as $name => $value) {
        $columns[] = $name;
        $values[] = $value;
    }

	/*Estos valores se capturan desde formviewer.php en los valores ocultos*/
    $formId = $values[count($values) - 2]; 
    $userId = $values[count($values) - 1];

    /*Entonces se inserta la nueva solicitud*/
    $sql1 = "INSERT INTO Historial_Formularios (Id_Formulario, Id_Usuario) VALUES ('$formId', '$userId')";
    if ($conn->query($sql1) === TRUE) {
        // Traer el ID del insert anterior.
        $last_id = $conn->insert_id;

        for ($i = 0; $i < count($values) - 2; $i++) {
            
			$preguntaLimpia = str_replace("_", " ", $columns[$i]);
            $value = $values[$i];
            // Insertar datos en tabla Respuestas_Formularios usando el ID generado en el query anterior.
            $sql2 = "INSERT INTO Respuestas_Formularios (Id_HistoriaFormulario, Desc_Pregunta, Desc_Respuesta) VALUES ('$last_id', '$preguntaLimpia', '$value')";
            $conn->query($sql2);
        }
        $conn->close();
        $url = "formviewer.php?form=$formId&log=submitted";
        echo "
            <script>
                window.location.href = \"$url\";
            </script>
            ";
        exit;
    }
}



?>