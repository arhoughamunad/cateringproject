<!DOCTYPE html>
<html lang="es">

<head>
    <title>Catering Services WebSite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="logo-touch-icon" href="./img/CateringService_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="./img/CateringService_logo.png">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/cateringservices_styles.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="./css/fontawesome.min.css"> 
<body>
    <?php include 'header.php';?>	

</body>

<!-- Carrusel de imágenes con descripción de servicios -->
    <div id="catering-carrusel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#catering-princ-carrusel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#catering-princ-carrusel" data-bs-slide-to="1"></li>
            <li data-bs-target="#catering-princ-carrusel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="img/Banner_1.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Catering</b>
                                <h3 class="h2">Reconocidos por el amor de nuestra gastronomía internacional</h3>
                                <p> Creamos tu experiencia soñada, en tu espacio soñado. 
                                    Mediante nuestros servicios de catering, podras saborear nuestros deliciosos platos de varias locaciones del mundo.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./img/Banner_2.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>Alquileres</b></h1>
                                <h3 class="h2">Alquiler de mobiliario y menaje</h3>
                                <p>
                                    Contamos con lo ultimo en la moda, para acondicionar tus espacios como mas te gusten
                                    Tu eres <strong>el invitado de honor</strong> nosotros prepararemos todo lo que necesites para tu evento.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./img/Banner_3.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>Cocteleria</b></h1>
                                <h3 class="h2">Cocteleria clasica y mixologia </h3>
                                <p>
                                    Haz que tus invitados disfruten de los mejores cocteles creados por ellos mismos, te enseñaremos a preparar tu coctel favorito.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#catering-carrusel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#catering-carrusel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->
	
	<!-- Sección de regiones del mes -->
    <section class="container py-5">
		<!-- Desc_Pregunta de descripción de sección -->
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Regiones del mes</h1>
                <p>
                    Cada mes renovamos nuestras ideas y asi dar a conocer los diferentes sabores de nuestro mundo.
                </p>
            </div>
        </div>
		    <!-- Contenedor para las diferentes experiencias -->
        <div class="row">
		<!-- Llamado para la imagen representativa -->
            <div class="col-12 col-md-4 p-5 mt-3">			
                <a href="shop.php"><img src="img/Mes_Peru.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Perú</h5>
				<!-- Boton de cotización -->
                <p class="text-center"><a href="shop.php" class="btn btn-success">Cotizar</a></p>
            </div>
			<!-- Llamado para la imagen representativa -->
            <div class="col-12 col-md-4 p-5 mt-3">
		    <a href="shop.php"><img src="img/Mes_Colombia.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Colombia</h2>
				<!-- Boton de cotización -->
                <p class="text-center"><a href="shop.php" class="btn btn-success">Cotizar</a></p>
            </div>
			<!-- Llamado para la imagen representativa -->
            <div class="col-12 col-md-4 p-5 mt-3">
				<a href="shop.php"><img src="img/Mes_Mexico.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">México</h2>
                <!-- Boton de cotización -->
				<p class="text-center"><a href="shop.php" class="btn btn-success">Cotizar</a></p>
            </div>
        </div>
    </section>
    <!-- Cierre de sección -->
	
	<!-- Sección para productos destacados -->
    <section class="bg-light">
        <div class="container py-5">
		<!-- Título de la sección -->
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Platos destacados del año</h1>
                    <p>
                        Recorriendo los sabores del mundo, nuestros agasajados este año optaron por nuestra gastronomia peruana.
                    </p>
                </div>
            </div>
			<!-- Fila contenedora de productos destacados-->
            <div class="row">
			<!-- Cuadro o targeta para el producto -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="img/Causa.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
							<!-- Nombre del producto -->
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Causa limeña</a>
							<!-- Descripción del producto -->
                            <p class="card-text">
                                Plato emblemático del Perú, combina capas de puré de papa amarilla sazonada con ají amarillo, limón y un toque de aceite,
								intercaladas con deliciosos rellenos como pollo desmenuzado, atún, mariscos o vegetales frescos.
								Todo coronado con una suave mayonesa, aceitunas, huevo duro y aguacate.
                            </p>
							
                        </div>
                    </div>
                </div>
				<!-- Cuadro o tarjeta para el producto -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="Img/Ceviche.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
					
							<!-- Nombre del producto -->
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Ceviche pesca blanca</a>
							<!-- Descripción del producto -->
                            <p class="card-text">
                                Ceviche! Preparado con pescado fresco del día, marinado en jugo de limón, un toque de ají picante. 
								Acompañado de cebolla morada, choclo tierno, camote dulce y un toque de cilantro fresco, 
								cada bocado es un balance perfecto entre acidez, frescura y picor.
                            </p>
							
                        </div>
                    </div>
                </div>
				<!-- Cuadro o targeta para el producto -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="img/Anticucho.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
													<!-- Nombre del producto -->
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Anticucho</a>
							<!-- Descripción del producto -->
                            <p class="card-text">
                                Preparados corazón de res marinado en una mezcla especial de ají panca, ajo, comino, vinagre y especias tradicionales,
								nuestros anticuchos son asados a la perfección sobre brasas, logrando ese característico toque ahumado y jugoso.
                            </p>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cierre de sección de productos destacados -->
	
    <?php include 'footer.php'; ?>

	
	<!-- Script necesarios para el correcto funcionamiento -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Cierred de Script -->
</head>
</html>
