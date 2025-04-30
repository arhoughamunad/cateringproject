<?php

include 'header.php';

// Gestion de sesion. Si no es un usuario loggeado, finalizar script.
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

if (isset($_COOKIE["user_data"])) {
    echo '<div class="main-container">';
    if ($user_role == 1 ) { // Si el usuario loggeado es el administrador, enseñar boton para registrar socio comercial.
        echo '
        <div id="register-business-container">
           <a href="register.php" class="btn btn-primary">Registrar un nuevo Usuario Comercial</a>
        </div>
        ';
    }


    $currentUserId = $user_id;
    // Verificar el rol del usuario actual para mostrar los datos adecuados.
    $sql = "SELECT Id_TipoUsuario, Fecha_Creacion   FROM Usuarios WHERE Id_Usuario = $currentUserId ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        return;
    }
    $row = $result->fetch_assoc();
	$Id_TipoUsuario = $row['Id_TipoUsuario'];
	$Fecha_Creacion = $row['Fecha_Creacion'];

  
    // Paginacion.
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $recordsPerPage = 8;
    $offset = ($page - 1) * $recordsPerPage;

    // Mostrar datos de acuerdo al usuario loggeado. Puede ser el administrador, usuario comercial (emprendedor) o usuario cliente.
    switch ($Id_TipoUsuario) {
        case 1: /*Usuario administrador*/
			echo "
                ¡Hola $user_name!<br><br> Aquí puedes consultar todos los mensajes de contacto.<br><br>
            ";
			$fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
			$fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';
        
				echo "<form method='GET'>
						<label for='fecha_inicio'>Fecha Inicio:</label>
						<input type='date' id='fecha_inicio' name='fecha_inicio' value='$fechaInicio'>
						<label for='fecha_fin'>Fecha Fin:</label>
						<input type='date' id='fecha_fin' name='fecha_fin' value='$fechaFin'>
						<input type='submit' class='add-send-btn' value='Filtrar'>
					  </form>";

			$filtroFecha = "";
			if (!empty($fechaInicio) && !empty($fechaFin)) {
				$filtroFecha = "WHERE c.Fecha_Contacto BETWEEN '$fechaInicio' AND '$fechaFin'";
			}
            // El usuario Administrador ve los formularios de contacto que han enviado.
            $sql = "SELECT c.Fecha_Contacto, c.Nombre_Apellido, c.Email, c.Mensaje
                    FROM Historial_Contactos c
					$filtroFecha
                    LIMIT $recordsPerPage OFFSET $offset";
            $result = $conn->query($sql);
			
            if ($result->num_rows > 0) {
                echo '<table border="1">';
                echo '<tr><th>Fecha</th><th>Nombre y Apellido</th><th>Email</th><th>Mensaje</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Fecha_Contacto'] . '</td>';
                    echo '<td>' . $row['Nombre_Apellido'] . '</td>';
                    echo '<td>' . $row['Email'] . '</td>';
                    echo '<td>' . $row['Mensaje'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';

                // Links paginacion.
                $resultTotal = $conn->query("SELECT COUNT(*) AS total FROM Historial_Contactos c $filtroFecha");
                $totalRows = $resultTotal->fetch_assoc()['total'];
                $totalPages = ceil($totalRows / $recordsPerPage);

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?userid=' . $currentUserId . '&page=' . $i . '">' . $i . '</a> ';
                }
            } else {
                echo "No hay mensajes recientes";
            }
            break;

        // Usuarios comerciales ven su area de Historial_Formularios unicamente.
        case 3: case 4: case 5:  /*Usuario emprendedor*/

            echo "
            ¡Hola $user_name!<br> Aquí puedes ver las consultas que te han realizado  <br><br>
			";
			
			$fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
			$fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';
        
				echo "<form method='GET'>
						<label for='fecha_inicio'>Fecha Inicio:</label>
						<input type='date' id='fecha_inicio' name='fecha_inicio' value='$fechaInicio'>
						<label for='fecha_fin'>Fecha Fin:</label>
						<input type='date' id='fecha_fin' name='fecha_fin' value='$fechaFin'>
						<input type='submit' class='add-send-btn' value='Filtrar'>
					  </form>";

			$filtroFecha = "";
			if (!empty($fechaInicio) && !empty($fechaFin)) {
				$filtroFecha = "and HF.Fecha_Formulario BETWEEN '$fechaInicio' AND '$fechaFin'";
			}
            // Verificar el formulario asociado a esos tipos de usuario
				$sql = "SELECT Id_Formulario FROM Formularios WHERE Id_TipoUsuario = $Id_TipoUsuario ";
				$result = $conn->query($sql);
				if ($result->num_rows == 0) {
					return;
				}
				$row = $result->fetch_assoc();
				$Id_Formulario = $row['Id_Formulario'];
				
            // Filtrar por ID del formulario. 
            $sql = "SELECT HF.Fecha_Formulario,
						   US.Nombre,
						   US.Telefono,
						   US.Email,
						   RF.Desc_Pregunta,
						   RF.Desc_Respuesta
						FROM Historial_Formularios HF
							JOIN Respuestas_Formularios RF
								ON HF.Id_HistoriaFormulario = RF.Id_HistoriaFormulario
							JOIN Preguntas_Formularios PF
								ON PF.Desc_Pregunta=RF.Desc_Pregunta
							JOIN Usuarios US
							    ON US.Id_Usuario=HF.Id_Usuario							
						WHERE HF.Id_Formulario = $Id_Formulario and PF.Id_Usuario=$currentUserId
						$filtroFecha
                    LIMIT $recordsPerPage OFFSET $offset";
            $result = $conn->query($sql); // Execute the query
            if ($result->num_rows > 0) {
                echo '<table border="1">';
                echo '<tr>
						<th>Fecha Solicitud</th>
						<th>Cliente</th>
						<th>Teléfono</th>
						<th>Email</th>
						<th>Pregunta</th>
						<th>Respuesta</th>
					 </tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['Fecha_Formulario'] . '</td>';
                    echo '<td>' . $row['Nombre'] . '</td>';
                    echo '<td>' . $row['Telefono'] . '</td>';
                    echo '<td>' . $row['Email'] . '</td>';
                    echo '<td>' . $row['Desc_Pregunta'] . '</td>';
                    echo '<td>' . $row['Desc_Respuesta'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';

                // Links paginacion.
                $resultTotal = $conn->query("SELECT COUNT(*) AS total 
												FROM Historial_Formularios HF
													JOIN Respuestas_Formularios RF
														ON HF.Id_HistoriaFormulario = RF.Id_HistoriaFormulario
													JOIN Usuarios US
														ON US.Id_Usuario=HF.Id_Usuario							
												WHERE HF.Id_Formulario = $Id_Formulario 
												and HF.Fecha_Formulario >= '$Fecha_Creacion'
												$filtroFecha" );
                $totalRows = $resultTotal->fetch_assoc()['total'];
                $totalPages = ceil($totalRows / $recordsPerPage);

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?userid=' . $currentUserId . '&page=' . $i . '">' . $i . '</a> ';
                }
            } else {
                echo "No se han encontrado solicitudes de servicios";
            }

            break;

		//Usuarios clientes pueden ver sus consultas enviadas
        case 2: /*Usuario Cliente*/
            echo " 
            ¡Hola $user_name!<br> Aquí puedes ver los servicios que has consultado.<br><br>
        ";
		
			$fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
			$fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';
        
				echo "<form method='GET'>
						<label for='fecha_inicio'>Fecha Inicio:</label>
						<input type='date' id='fecha_inicio' name='fecha_inicio' value='$fechaInicio'>
						<label for='fecha_fin'>Fecha Fin:</label>
						<input type='date' id='fecha_fin' name='fecha_fin' value='$fechaFin'>
						<input type='submit' class='add-send-btn' value='Filtrar'>
					  </form>";

			$filtroFecha = "";
			if (!empty($fechaInicio) && !empty($fechaFin)) {
				$filtroFecha = "and HF.Fecha_Formulario BETWEEN '$fechaInicio' AND '$fechaFin'";
			}	
            
            $sql = "SELECT HF.Fecha_Formulario,
						   HF.Id_HistoriaFormulario,
						    F.Desc_Formulario,
						   US.Nombre,
						   US.Email,
						   RF.Desc_Pregunta,
						   RF.Desc_Respuesta
						FROM Historial_Formularios HF
							JOIN Respuestas_Formularios RF
								ON HF.Id_HistoriaFormulario = RF.Id_HistoriaFormulario
							JOIN Formularios F
								ON F.Id_Formulario=HF.Id_Formulario
							JOIN Preguntas_Formularios PF
								ON PF.Desc_Pregunta=RF.Desc_Pregunta
							JOIN Usuarios US
							    ON US.Id_Usuario=PF.Id_Usuario
						WHERE HF.Id_Usuario=$currentUserId $filtroFecha
            LIMIT $recordsPerPage OFFSET $offset";
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {
                echo '<table border="1">';
                echo '<tr>
						<th>Fecha</th>
						<th>Número de solicitud</th>
						<th>Servicio</th>
						<th>Emprendedor</th>
						<th>Email</th>
						<th>Pregunta</th>
						<th>Respuesta</th>
					</tr>';
				   while ($row = $result->fetch_assoc()) {
						echo '<tr>';
						echo '<td>' . $row['Fecha_Formulario'] . '</td>';
						echo '<td>' . $row['Id_HistoriaFormulario'] . '</td>';
						echo '<td>' . $row['Desc_Formulario'] . '</td>';
						echo '<td>' . $row['Nombre'] . '</td>';
						echo '<td>' . $row['Email'] . '</td>';
						echo '<td>' . $row['Desc_Pregunta'] . '</td>';
						echo '<td>' . $row['Desc_Respuesta'] . '</td>';
						echo '</tr>';
					}

                echo '</table>';

                // Links paginacion.
                $resultTotal = $conn->query("SELECT COUNT(*) AS total
                                                    FROM Historial_Formularios HF
														JOIN Respuestas_Formularios RF
															ON HF.Id_HistoriaFormulario = RF.Id_HistoriaFormulario
														JOIN Formularios F
															ON F.Id_Formulario=HF.Id_Formulario
														JOIN Usuarios US
															ON US.Id_TipoUsuario=F.Id_TipoUsuario and
															   HF.Fecha_Formulario>=US.Fecha_Creacion
													WHERE HF.Id_Usuario=$currentUserId $filtroFecha");
                $totalRows = $resultTotal->fetch_assoc()['total'];
                $totalPages = ceil($totalRows / $recordsPerPage);

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?userid=' . $currentUserId . '&page=' . $i . '">' . $i . '</a> ';
                }
            } else {
                echo "No he encontrado solicitudes de servicios";
            }

            break;
    }
}



echo "</div>";


include 'footer.php';



?>