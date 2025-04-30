<?php 

// Ver, actualizar o cerrar sesion de usuario (gestion de usuario) usando el cookie de sesion.

// Ver

if (isset($_COOKIE['user_data'])) {
    // Deserialize the cookie value
    $deserializedData = unserialize($_COOKIE['user_data']);
    echo "Name: " . $deserializedData['nombre'];
    echo "Role: " . $deserializedData['rol'];
    echo "ID: " . $deserializedData['user'];
}


// Actualizar


// $data = [
//     "user" => "1",
//     "rol" => "1",
//     "nombre" => "ADMIN"
// ];

// // Serialize the array
// $serializedData = serialize($data);
// // Save the serialized data as a cookie
// setcookie("user_data", $serializedData, time() + 7200, "/");



// Eliminar - Cerrar sesion.

// setcookie("user_data", "", time() - 3600, "/");


?>