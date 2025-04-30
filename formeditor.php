<?php
include 'header.php';
echo '<div class="main-container">';
// Conexion base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cateringdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Gestion de sesion.
if (!isset($_COOKIE['user_data'])) {
    echo "No tienes acceso para ver esta página.";
    exit;
} else {
    // Deserializar y acceder a los valores del cookie.
    $deserializedData = unserialize($_COOKIE['user_data']);
    $user_name = $deserializedData['nombre'];
    $user_role = $deserializedData['rol'];
    $user_id = $deserializedData['user'];
    if ($user_role != 3 && $user_role != 4 && $user_role != 5) {
        echo "No tienes acceso para ver esta página.";
        echo "<br>";
        // echo $user_role;
        exit;
    }

    $formtitle = "";
	$sql = "SELECT Desc_Formulario FROM Formularios WHERE Id_TipoUsuario = $user_role ";
        $result = $conn->query($sql);
        $form_data = $result->fetch_assoc();
        $formtitle = $form_data["Desc_Formulario"];
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario de Servicio: <?php echo $formtitle; ?> </title>
</head>

<body>
    <h1>Cuestionario de Servicio: <?php echo $formtitle; ?></h1>
    <form id="dynamicForm" onsubmit="return validateForm()" action="formeditorhandler.php" method="POST">
        <div id="questionsContainer">
            <div class="questionSet">
                <!-- Pregunta -->
                <label for="pregunta">Pregunta:</label>
                 <input type="text" name="pregunta[]" required style="width: 500px; height: 40px; font-size: 16px;"><br><br>

                <!-- Tipo de Entrada -->
                <label for="tipoEntrada">Tipo de Entrada:</label>
                <select name="tipoEntrada[]">
                    <option value="text">Texto</option>
                    <option value="number">Número</option>
                </select><br><br>

                <!-- ¿Es Requerido?  -->
                <label for="esRequerido">¿Es Requerido?:</label>
                <select name="esRequerido[]">
                    <option value="1">Requerido</option>
                    <option value="0">No Requerido</option>
                </select><br><br>
            </div>
        </div>

        <button type="button" class="add-send-btn" onclick="addQuestion()">Agregar Pregunta</button><br><br>

        <?php
        // Forma objetivo a modificar (mismo Desc_Respuesta que el rol del ID comercial conectado). 
        echo "<input type='hidden' name='rol' value='$user_role'>";
		echo "<input type='hidden' name='user' value='$user_id'>";
           
        ?>

        <input type="submit" class="add-send-btn" value="Enviar">
    </form>

    <script>
        // Agregar nueva pregunta. Clonar contenedor, procesar (eliminar datos clonados), agregar nuevo contenedor.
        function addQuestion() {
            const questionsContainer = document.getElementById("questionsContainer");

            const newQuestionSet = questionsContainer.querySelector(".questionSet").cloneNode(true);

            newQuestionSet.querySelectorAll("input, select").forEach(element => {
                if (element.tagName === "INPUT") {
                    element.value = ""; // Clear text inputs
                } else if (element.tagName === "SELECT") {
                    element.selectedIndex = 0; // Reset select inputs to the first option
                }
            });

            questionsContainer.appendChild(newQuestionSet);
        }

        // Validacion del formulario.
        function validateForm() {
            const questionSets = document.querySelectorAll(".questionSet");
            let isValid = true;

            questionSets.forEach((set, index) => {
                const pregunta = set.querySelector("[name='pregunta[]']").value;
                const tipoEntrada = set.querySelector("[name='tipoEntrada[]']").value;
                const esRequerido = set.querySelector("[name='esRequerido[]']").value;
                const dynamicInput = set.querySelector("[name='dynamicInput[]']");

                if (!pregunta) {
                    alert(`La pregunta ${index + 1} no puede estar vacía.`);
                    isValid = false;
                }

                if (esRequerido === "requerido" && dynamicInput && !dynamicInput.value) {
                    alert(`El campo dinámico para la pregunta ${index + 1} es requerido.`);
                    isValid = false;
                }
            });

            return isValid;
        }
    </script>
</body>

</html>


<?php
echo "</div>";
include 'footer.php';

?>