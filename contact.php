<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Título que aparecerá en la pestaña del navegador -->
    <title>Catering Services - Contacto</title>
    <!-- Configuracion de codificación para que soporte caracteres especiales -->
    <meta charset="utf-8">
    <!-- Configuracion paa la vista en dispositivos mobiles / diseño responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Definición del icono de la página para dispositivos Apple y para la barra del navegador -->
    <link rel="apple-touch-icon" href="./img/CateringService_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="./img/CateringService_logo.png">
    <!-- Enlace a hojas de estilo CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/cateringservices_styles.css">

    <!-- Carga de fuentes de google despues de los estilos  -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="./css/fontawesome.min.css">

  
</head>

<body>
    <?php include 'header.php'; ?>


    <!-- Inicio de sección para el contenido de la pagina contacto -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contáctenos</h1>
            <p>
                Nuestro horario de atención personalizada es de Lunes a Viernes de 8:00 am a 5:00 pm y sabados de 8:00
                am a 2:00 pm

            </p>
        </div>
    </div>
    <!-- Fin de sección para el contenido de la pagina contacto -->
      <!-- Iniciio para seccion del mapa interactivo -->
    <div id="mapid" style="width: 100%; height: 300px;"></div>

	<script>
        function initMap() {
            console.log("Inicializando mapa...");
            const mapElement = document.getElementById("mapid");

            const map = new google.maps.Map(mapElement, {
                center: { lat: 4.6689, lng: -74.0550 },
                zoom: 15,
                mapId: "398bb1b7329cd378"
            });

            new google.maps.Marker({
                position: { lat: 4.6689, lng: -74.0550 },
                map: map,
                title: "Cra. 12a #83-49, Chapinero, Bogotá, Cundinamarca."
            });
        }

        window.onload = function() {
            console.log("Cargando Google Maps...");
            const script = document.createElement("script");
            script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDdQ66k-OlKZa2okkU7c6WOjDLmUx4VEdc&map_ids=398bb1b7329cd378&callback=initMap";
            script.async = true;
            script.defer = true;
            document.body.appendChild(script);
        };
    </script>
    <!-- Fin de mapa interactivo -->

    <!-- Inicio de formulario de contacto -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" action="contact_process.php" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Nombre y apellidos</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Correo electronico</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Mensaje</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Message"
                        rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Fin de formulario de contacto -->


    <?php include 'footer.php'; ?>


    <!-- Script necesarios para el correcto funcionamiento -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script> 
    <!-- Cierred de Script -->
</body>

</html>