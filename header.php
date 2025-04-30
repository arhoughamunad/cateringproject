<head>
    <!-- <title>Catering Services - Contacto</title> -->
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




<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="caterinng_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none"
                    href="mailto:info@company.com">hougham.compras@gmail.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">300-413-4321</a>
            </div>
            <div>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                        class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                        class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->


<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            Catering Services
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#menu_nav_principal" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
            id="menu_nav_principal">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contáctenos</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <!-- Muestra el visor de Historial_Formularios recibidos si el usuario ha iniciado sesion o la pagina del login si no.  -->
                <a class="nav-icon position-relative text-decoration-none" href="<?php
                if (isset($_COOKIE['user_data'])) {
                    echo "submissionviewer.php";
                } else
                    echo "login.php";
                ?>">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
                <!-- Muestra el boton para cerrar sesion (logout) si el usuario ha iniciado sesion. -->
                <?php
                if (isset($_COOKIE['user_data'])) {
                    echo '<a href="logout.php" id="logout-button"> <span>Cerrar Sesión</span> </a>';
                }
                ?>

            </div>
        </div>

    </div>
</nav>
<script src="./js/bootstrap.bundle.min.js"></script>

<!-- Close Header -->

