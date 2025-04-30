<?php
// Cerrar sesion borrando el cookie de sesion. Redirigir a Servicios (shop) con notificacion de logout.
setcookie("user_data", "", time() - 3600, "/");
$url = "shop.php?log=logout";
echo "
<script>
    window.location.href = \"$url\";
</script>
";
exit;

?>