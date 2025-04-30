<?php
// Crear password para Administrador. Copiar hash en campo correspondiente en base de datos usando PHPmyAdmin.
$ps = "A10manager.";
$hash = password_hash($ps, PASSWORD_DEFAULT);
echo $hash;




?>