<?php
$servername = "localhost";
$username = "root"; // Default username
$password = ""; // Default password is empty
$dbname = "cateringdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_COOKIE['user_data'])) {
    // Deserialize the cookie value
    $deserializedData = unserialize($_COOKIE['user_data']);
    $user_name = $deserializedData['nombre'];
    $user_role = $deserializedData['rol'];
    $user_id = $deserializedData['user'];

    // echo "<style> #logout-button { display: true !important ;} </style>";

}


if (isset($_GET["log"])) {
    $log = $_GET["log"];
    // echo "ERROR IS " . $errorcode;
    if ($log == "login") {
        echo '
        <div class="success">Acabas de iniciar sesión.</div>  
      ';
    }
    if ($log == "logout") {
        echo '
        <div class="success">Acabas de cerrar sesión.</div>  
      ';
    }
    if ($log == "register") {
        echo '
        <div class="success">Registro exitoso.</div>  
      ';
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Catering Services - Servicios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="./img/CateringService_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="./img/CateringService_logo.png">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/cateringservices_styles.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="./css/fontawesome.min.css">

</head>

<body>
    <?php include 'header.php'; ?>




    <!-- Start Content -->
    <?php
    if (isset($_COOKIE['user_data'])) { // Si un usuario comercial esta loggeado, enseñar boton para edicion de su formulario de servicio.
        if ($user_role == 3 || $user_role == 4 || $user_role == 5) {
            echo '
            <div id="edit-form-container">
               <a href="formeditor.php">Ingresar preguntas al formulario</a><br><br>
			   <a href="formhabilitar.php">Habilitar o deshabilitar preguntas al formulario</a>
            </div>
            ';
        }
    }

    ?>

    <div class="container py-5">
        <div class="row" style="display: flex; flex-wrap: nowrap; justify-content: center;">
            <?php include 'carrousel.php'; ?>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Nuestros aliados</h1>
                    <p>
                        Contamos con marcas aliadas que nos proveen de materia prima de primera calidad
                    </p>
                </div>
                <div class="col-lg-9 m-auto catering-carrusel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#carrusel-marcas" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="carrusel-marcas"
                                data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_1.jpeg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_2.jpg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_3.jpg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_4.jpg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->
                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_1.jpeg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_2.jpg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_3.png"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_4.jpg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->
                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_1.jpeg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_2.jpg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_3.png"
                                                        alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="./img/Aliado_4.jpg"
                                                        alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Third slide-->
                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#carrusel-marcas" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


    <?php include 'footer.php'; ?>


    <!-- Start Script -->
    <script src="./js/jquery-1.11.0.min.js"></script>
    <script src="./js/jquery-migrate-1.2.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    
    
    <!-- End Script -->
</body>

</html>