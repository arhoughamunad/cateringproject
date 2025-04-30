<?php
// Dado que se utilizan diferentes preguntas en form con mismo atributo name, los campos $preguntas, $tipoEntradas y $esRequeridos corresponden a arrays 
// con todos los valores en orden.
$preguntas = $_POST["pregunta"];
$tipoEntradas = $_POST["tipoEntrada"];
$esRequeridos = $_POST["esRequerido"]; 
$user_role = $_POST["rol"]; /*Este es el tipo de usuario*/
$user_id = $_POST["user"]; 
// Conexion base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cateringdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Buscar el Id_Formulario en la tabla Formularios
    $sql = "SELECT Id_Formulario FROM Formularios WHERE Id_TipoUsuario = $user_role";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $realFormId = $row['Id_Formulario'];}

// Despues, sube cada nueva pregunta al los campos de formulario objetivo en base de datos.
for ($i = 0; $i < count($preguntas); $i++) {
    $sql = "INSERT INTO Preguntas_Formularios
						(Id_Formulario, 
						Id_Usuario,
						Desc_TipoDato, 
						Desc_Pregunta, 
						Cb_EsRequerida,
						Cb_EsHabilitada) 
						VALUES ('$realFormId', '$user_id', '$tipoEntradas[$i]','$preguntas[$i]','$esRequeridos[$i]', 1);";
    $result = $conn->query($sql);
}
// echo $user_role;
// Redirigir al usuario a ver el formulario junto con un mensaje de notificacion.
$conn->close();
$url = "formviewer.php?form=$realFormId&log=updated";
echo "
<script>
    window.location.href = \"$url\";
</script>
";
exit;











?>