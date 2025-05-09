<!DOCTYPE html>
<!-- Define el documento HTML y el idioma predeterminado como inglés -->
<html lang="en">

<head>
    <!-- Define el título de la página que aparecerá en la pestaña del navegador -->
    <title>Catering Services - Sobre nosotros</title>

    <!-- Configuración de codificación de caracteres para soportar caracteres especiales -->
    <meta charset="utf-8">

    <!-- Configuración de la vista en dispositivos móviles para que el diseño sea responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Definición del icono de la página para dispositivos Apple y para la barra del navegador -->
    <link rel="apple-touch-icon" href="./img/CateringService_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="./img/CateringService_logo.png">

    <!-- Enlace a hojas de estilo CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css"> <!-- Framework Bootstrap -->
    <link rel="stylesheet" href="./css/cateringservices_styles.css"> <!-- Estilos personalizados -->

    <!-- Carga de fuentes de Google después de los estilos -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="./css/fontawesome.min.css"> <!-- Iconos de FontAwesome -->

</head>

<body>
    <?php include 'header.php'; ?>


     <!-- Sección de "Sobre Nosotros" -->
    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <!-- Columna para el texto descriptivo -->
                <div class="col-md-8 text-white">
                    <h1>Sobre nosotros</h1>
                    <p>
                        En <b>Catering Services</b>, reunimos a emprendedores apasionados del sector gastronómico
						y de catering en un solo espacio digital, facilitando la exposición de sus servicios y optimizando los costos de 
						mantenimiento de un portal web propio. Nuestra plataforma está diseñada para transformar eventos en experiencias únicas, 
						conectando a clientes con profesionales especializados en catering, alquiler de menaje, mobiliario y servicios de coctelería.
					 </p>
					 <p>
						Cada emprendedor en nuestra comunidad aporta creatividad, atención al detalle y un firme compromiso con la calidad, ofreciendo 
						soluciones personalizadas
						para reuniones sociales y corporativas. Desde elegantes vajillas y mesas hasta exclusivas barras de coctelería, encontrarás una 
						amplia gama de opciones para que cada evento refleje un estilo auténtico.
					</p>
					<p>
						Ya sea una boda, un cumpleaños, una reunión empresarial o cualquier tipo de celebración, en <b>Catering Services</b> facilitamos el acceso a los mejores talentos del sector, para que tú solo te preocupes por disfrutar.
						<b>¡Déjanos ser el puente que conecta tu evento con una experiencia inolvidable!</b>                        
                    </p>
                </div>
                <!-- Columna para la imagen representativa -->
                <div class="col-md-4">
                    <img src="./img/Quienes_Somos.jpg" alt="About">
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de la sección "Sobre Nosotros" -->

    <!-- Sección de "Servicios Adicionales" -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Servicios adicionales</h1>
                <p>
                    Contamos con servicios adicionales, para mejorar tu experiencia y que solo tengas que disfrutar de
                    nuestro servicio.
                </p>
            </div>
        </div>
        <div class="row">
            <!-- Bloque de Servicio 1 -->
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Servicio de entrega y recogida en sitio</h2>
                </div>
            </div>
            <!-- Bloque de Servicio 2 -->
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Contrataciones musicales</h2>
                </div>
            </div>
            <!-- Bloque de Servicio 3 -->
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Promociones destacadas</h2>
                </div>
            </div>
            <!-- Bloque de Servicio 4 -->
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">Servicio las 24hs</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de la sección "Servicios Adicionales" -->

    <!-- Sección de "Nuestros Aliados" -->
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
                        <!-- Control para retroceder el carrusel -->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#carrusel-marcas" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!-- Fin del control de retroceso -->

                        <!-- Contenedor carrusel de marcas -->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="carrusel-marcas"
                                data-bs-ride="carousel">
                                <!-- Inicio de las diapositivas -->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--Primer slide del carrousel-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <!-- Cada columna contiene un logo de aliado-->
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
                                    <!--Cierre del primer slide-->
                                    <!--Apertura del segundo slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <!--Cada columna contiene un logo de aliado-->
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
                                    <!--Cierre del segundo slide-->
                                    <!--Apertura del tercer slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <!--Cada columna contiene un logo de aliado-->
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
                                    <!--Ciere del tercer slide-->
                                </div>
                            </div>
                        </div>
                        <!--Cierre de carrousel-->

                        <!--Control de carrousel-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#carrusel-marcas" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--Fin de controles-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cierre -->
    
    
    <?php include 'footer.php'; ?>


    <!-- Llamado de los de Script -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script> 
    <!-- cierre de los llamados de Script -->

</body>

</html>