<?php

if (isset($_GET["log"])) {
    $log = $_GET["log"];
    if ($log == "updated") {
        echo '
        <div class="success">Formulario de Servicio actualizado.</div>  
      ';
    } 
    if ($log == "submitted") {
        echo '
        <div class="success">Formulario de Servicio enviado con éxito.</div>  
      ';
    } 
}

include 'header.php';

// Gestion de sesion.
if (!isset($_COOKIE['user_data'])) {
    echo "No tienes acceso para ver esta página.";
    exit;
} else {
    $deserializedData = unserialize($_COOKIE['user_data']);
    $user_name = $deserializedData['nombre'];
    $user_role = $deserializedData['rol'];
    $user_id = $deserializedData['user'];
}


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cateringdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET["form"])) {
    echo "
    <script>
        window.location.href = \"shop.php\";
    </script>
    ";
    exit;
}

$Id_Formulario= intval($_GET["form"]);

// ID del formulario y Descripción del formulario partiendo del Id_Formulario

$formtitle = "";
$sql = "SELECT Desc_Formulario, Id_Formulario FROM Formularios WHERE Id_Formulario = $Id_Formulario ";
        $result = $conn->query($sql);
        $form_data = $result->fetch_assoc();
        $formtitle = $form_data["Desc_Formulario"];
		$formId = $form_data["Id_Formulario"];

echo "<div class=\"main-container\">
        <h1>Formulario de: $formtitle</h1>
";

// Gestion de sesion.
$currentUserId = $user_id;

// Traer los campos del formulario a renderizar.
$sql = "SELECT Desc_TipoDato, Desc_Pregunta, Cb_EsRequerida FROM Preguntas_Formularios WHERE Id_Formulario = $formId and Cb_EsHabilitada=1 ORDER BY Id_Pregunta ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generar preguntas de un formulario de un servicio existente y crear cada campo correspondiente tal como esta en la base de datos.
    echo '<form action="formviewerhandler.php" method="post">';
    while ($row = $result->fetch_assoc()) {
        $Desc_TipoDato = $row['Desc_TipoDato'];
        $Desc_Pregunta = $row['Desc_Pregunta'];
        $Cb_EsRequerida = $row['Cb_EsRequerida'] ? "required" : "";
        $isRequiredSign = $Cb_EsRequerida == "required" ? "<sup style=\"color: red;\">*</sup>" : "";

        echo '<div>';
        echo '<label class="form-question" for="' . $Desc_Pregunta . '">' . $Desc_Pregunta . $isRequiredSign . '</label>';
        echo '<input type="' . $Desc_TipoDato . '" name="' . $Desc_Pregunta . '" id="' . $Desc_Pregunta . '" ' . $Cb_EsRequerida . '>';
        echo '</div>';
    }
    // Enviar (escondidos) id del usuario actual e id de formulario.
    echo "
        <input type='hidden' name='FID' value='$formId'>
        <input type='hidden' name='CID' value='$currentUserId'>

    ";
    echo '<input type="submit" class="add-send-btn" value="Enviar">';
    echo '</form>';
} else {
    echo "No se han encontrado preguntas de este formulario.";
}


echo "</div>";


include 'footer.php';



?>

<style>
    form {
        display: flex;
        flex-direction: column;
        row-gap: 20px;
    }

    form>div {
        display: flex;
        flex-direction: column;
        row-gap: 15px;
    }


    input[type="text"] {
        width: 300px;
        height: 50px;
        padding: 10px;
    }

    input[type="number"] {
        width: 50px;
    }

    input[type="submit"] {
        width: 100px;
    }

    label {
        font-size: 20px;
        font-weight: 600;
        font-family: Roboto, sans-serif;
    }
</style>