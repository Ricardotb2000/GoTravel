<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelos - Hotel</title>

<link rel="icon" href="../imagenes/GoTravel.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="Vuelo_hotel.css">

</head>
<body>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand mx-auto d-lg-block d-none" href="../Index.php#home">
            <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp" style="width: 75px; height: 75px; border-radius: 100px;">
            <span class="brand-txt"></span>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menú principal a la izquierda -->
            <ul class="navbar-nav me-auto ms-4">
                <li class="nav-item">
                    <a class="nav-link" href="../Index.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#buscador">
                        <i class="fas fa-globe"></i> Destinos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#hotelpacks">
                        <i class="fas fa-hotel"></i> Hoteles
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        <i class="fas fa-envelope"></i> Contacto
                    </a>
                </li>
            </ul>

            <!-- Enlaces de Sign In y Carrito a la derecha -->
            <ul class="navbar-nav ms-auto me-2">
                <li class="nav-item">
                    <a class="nav-link" href="../login_signin/Login.php">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../carrito/Carrito.php">
                        <i class="fas fa-shopping-cart"></i> Carrito
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Carrusel -->
    <div class="container-fluid p-0" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel"> <!-- Cambia data-ride a data-bs-ride -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="../imagenes/Carrusel-4.jpg" alt="Imagen">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px; margin-bottom: 5%;">
                            <h1 class="display-3 text-white mb-md-4">Pierdete en el viaje de tu Vida</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../imagenes/Carrusel-5.jpg" alt="Imagen">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px; margin-bottom: 5%;">
                            <h1 class="display-3 text-white mb-md-4">Lugares increíbles por ver</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../imagenes/Carrusel-7.jpg" alt="Imagen">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px; margin-bottom: 5%;">
                            <h1 class="display-3 text-white mb-md-4">El paraíso en tus manos</h1>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-bs-slide="prev"> <!-- Cambia data-slide a data-bs-slide -->
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-bs-slide="next"> <!-- Cambia data-slide a data-bs-slide -->
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>

    <!-- Iniciar Reserva -->
    <div class="container-fluid booking mt-5 pb-5" style="position: relative; z-index: 10;">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row justify-content-center">
                            <div class="col-md-4"> <!-- Tamaño uniforme -->
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px; width: 100%;"> <!-- Ajuste de ancho -->
                                        <option selected disabled>Destinos</option>
                                        <option value="1">Bulgaria</option>
                                        <option value="2">Italia</option>
                                        <option value="3">Marruecos</option>
                                        <option value="4">Turquía</option>
                                        <option value="5">China</option>
                                        <option value="6">Japón</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4"> <!-- Tamaño uniforme -->
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Fecha ida" data-target="#date2" data-toggle="datetimepicker" style="height: 47px;" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"> <!-- Tamaño uniforme -->
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Fecha vuelta" data-target="#date2" data-toggle="datetimepicker" style="height: 47px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button id="search-btn" class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px; width: 100%;">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pantalla de carga -->
    <div id="loading-screen" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255,255,255,0.9); z-index: 1000; text-align: center; padding-top: 20%;">
        <div class="progress" style="width: 50%; margin: 0 auto;">
            <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p>Buscando...</p>
    </div>

    <!-- Contenedor del slider -->
    <div class="text-center mb-3 pb-3" id="buscador">
        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Continentes por Descubrir</h6>
        <h3 class="text-dark">Principales destinos</h3>
    </div>
    <div class="container-slider1" id="slider">
        <div class="slide">
            <img src="../imagenes/Grecia_fullimg.jpg" class="slide__image" alt="">
            <h3 class="slide__title">Europa</h3>
        </div>
        <div class="slide">
            <img src="../imagenes/Tailandia_fullimg.jpg" alt="" class="slide__image">
            <h3 class="slide__title">Asia</h3>
        </div>
        <div class="slide">
            <img src="../imagenes/Argentina.jpg" alt="" class="slide__image">
            <h3 class="slide__title">América</h3>
        </div>
            <div class="slide">
            <img src="../imagenes/Australia.jpg" alt="" class="slide__image">
        <h3 class="slide__title">Oceanía</h3>
        </div>
    </div>

    <div class="container-fluid py-5" id="hotelpacks">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packs de Viaje</h6>
            <h1 class="text-dark">Hoteles Recomendados</h1>
        </div>

        <div class="row">
            <!-- Card 1 - Bulgaria -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="../imagenes/Hotel_imperial-resort_BG.jpg" alt="Imagen" >
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Bulgaria</small>
                            <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>Por noche</small>
                            <small class="m-0"><i class="fa fa-user text-primary me-2"></i>1 Persona</small>
                        </div>
                        <a class="h5 text-decoration-none" href="">Hotel Imperial Resort - Bulgaria</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">117€</h5>
                                <button class="btn btn-primary btn-sm" 
                                    data-destination="Bulgaria"
                                    data-description="Hotel de Lujo 5 estrellas en Sunny Beach" 
                                    data-duration="1 Noche" 
                                    data-people="1" 
                                    data-price="117" 
                                    onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Italia -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="../imagenes/Hotel_GrandHotel_IT.jpg" alt="Imagen">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Italia</small>
                            <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>Por noche</small>
                            <small class="m-0"><i class="fa fa-user text-primary me-2"></i>1 Persona</small>
                        </div>
                        <a class="h5 text-decoration-none" href="">Hotel GrandHotel & Resort - Italia</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">135€</h5>
                                <button class="btn btn-primary btn-sm" 
                                    data-destination="Italia"
                                    data-description="Hotel de Lujo 5 estrellas en Cluj-Napoca" 
                                    data-duration="1 Noche" 
                                    data-people="1" 
                                    data-price="135" 
                                    onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Marruecos -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="../imagenes/Hotel_Riad_dar_MA.jpg" alt="Imagen">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Marruecos</small>
                            <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>Por noche</small>
                            <small class="m-0"><i class="fa fa-user text-primary me-2"></i>1 Persona</small>
                        </div>
                        <a class="h5 text-decoration-none" href="">Hotel Riad Dar - Marruecos</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">176€</h5>
                                <button class="btn btn-primary btn-sm" 
                                    data-destination="Marruecos"
                                    data-description="Hotel de Lujo 4 estrellas en Marrakech"   
                                    data-duration="1 Noche" 
                                    data-people="1" 
                                    data-price="176" 
                                    onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 - Turquía -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="../imagenes/Hotel_concorde-Deluxe-resort_TR.jpg" alt="Imagen">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Turquía</small>
                            <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>Por noche</small>
                            <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                        </div>
                        <a class="h5 text-decoration-none" href="">Concorde Deluxe Resort - Turquía</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">436€</h5>
                                <button class="btn btn-primary btn-sm" 
                                    data-destination="Turquía"
                                    data-description="Hotel de Lujo 5 estrellas en Antalya"   
                                    data-duration="1 Noche" 
                                    data-people="2" 
                                    data-price="436" 
                                    onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 - China -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="../imagenes/Hotel_GrandBeijingHotel_CHN.jpg" alt="Imagen">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>China</small>
                            <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>Por Noche</small>
                            <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                        </div>
                        <a class="h5 text-decoration-none" href="">Hotel GrandBeijing - China</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">191€</h5>
                                <button class="btn btn-primary btn-sm" 
                                    data-destination="China" 
                                    data-description="Hotel de Lujo 4 estrellas en Pekín"  
                                    data-duration="1 Noche" 
                                    data-people="2" 
                                    data-price="191" 
                                    onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 - Japón -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="../imagenes/Hotel_Villa_Fontaine_JP.jpg" alt="Imagen">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Japón</small>
                            <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>Por noche</small>
                            <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                        </div>
                        <a class="h5 text-decoration-none" href="">Hotel Villa Fontaine - Japón</a>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0">268€</h5>
                                <button class="btn btn-primary btn-sm" 
                                    data-destination="Japón"
                                    data-description="Hotel de Lujo 4 estrellas en Tokio"  
                                    data-duration="1 Noche" 
                                    data-people="2" 
                                    data-price="268" 
                                    onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



    <!-- Aerolíneas -->
    <div class="text-center mb-3 pb-3">
        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Viaja seguro</h6>
        <h3 class="text-dark">Nuestras Aerolineas</h3>
    </div>
    <div id="airlinesCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 70%; margin: 0 auto;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <a href="https://www.ryanair.com" target="_blank">
                        <img src="../imagenes/Ryanair.png" class="d-block airline-img" alt="Ryanair" style="margin: 0 5px;">
                    </a>
                    <a href="https://www.vueling.com" target="_blank">
                        <img src="../imagenes/Vueling.png" class="d-block airline-img" alt="Vueling" style="margin: 0 5px;">
                    </a>
                    <a href="https://www.iberia.com" target="_blank">
                        <img src="../imagenes/Iberia.png" class="d-block airline-img" alt="Iberia" style="margin: 0 5px;">
                    </a>
                    <a href="https://www.aireuropa.com" target="_blank">
                        <img src="../imagenes/AirEuropa.png" class="d-block airline-img" alt="Air Europa" style="margin: 0 5px;">
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <a href="https://www.easyjet.com" target="_blank">
                        <img src="../imagenes/EasyJet.png" class="d-block airline-img" alt="EasyJet" style="margin: 0 5px;">
                    </a>
                    <a href="http://www.airnostrum.es/" target="_blank">
                        <img src="../imagenes/AirNostrum.png" class="d-block airline-img" alt="Air Nostrum" style="margin: 0 5px;">
                    </a>
                    <a href="https://www.eurowings.com" target="_blank">
                        <img src="../imagenes/Eurowings.png" class="d-block airline-img" alt="Eurowings" style="margin: 0 5px;">
                    </a>
                    <a href="https://www.jet2.com" target="_blank">
                        <img src="../imagenes/Jet2.png" class="d-block airline-img" alt="Jet2" style="margin: 0 5px;">
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#airlinesCarousel" data-bs-slide="prev" 
                style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); height: 30px; width: 30px;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next bg-dark" type="button" data-bs-target="#airlinesCarousel" data-bs-slide="next" 
                style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); height: 30px; width: 30px;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" id="contact" style="margin-top: 90px; text-align: center;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">GO</span>TRAVEL</h1>
                </a>
                <p>GoTravel ofrece experiencias de viaje auténticas y memorables. 
                    Descubre destinos fascinantes y crea recuerdos inolvidables con nosotros. 
                    ¡Prepárate para una aventura inolvidable con GoTravel</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros Servicios</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="../Index.php#home"><i class="fa fa-home me-2"></i>Home</a>
                    <a class="text-white-50 mb-2" href="../Index.php#about-us"><i class="fa fa-info-circle me-2"></i>Sobre Nosotros</a>
                    <a class="text-white-50 mb-2" href="../Index.php#packs"><i class="fa fa-box me-2"></i>Packs</a>
                    <a class="text-white-50 mb-2" href="../Index.php#contact"><i class="fa fa-envelope me-2"></i>Contacto</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-plane me-2"></i>Vuelo + Hotel</a>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contactanos</h5>
                <p><i class="fa fa-map-marker-alt me-2"></i><a href="https://www.google.com/maps/place/C.+Viento,+1,+28220+Majadahonda,+Madrid/@40.4728071,-3.8782723,17z/data=!3m1!4b1!4m6!3m5!1s0xd41848df8092f4f:0x9994f047ccc25eac!8m2!3d40.4728071!4d-3.8756974!16s%2Fg%2F11csmg05nw?entry=ttu&g_ep=EgoyMDI0MTAwOS4wIKXMDSoASAFQAw%3D%3D" class="text-white" target="_blank">Calle Viento nº1 ,28220, Majadahonda</a></p>
                <p><i class="fa fa-phone-alt me-2"></i><a href="tel:+0123456789" class="text-white">+0123 456 789</a></p>
                <p><i class="fa fa-envelope me-2"></i><a href="mailto:GoTravel@gmail.com" class="text-white">GoTravel@gmail.com</a></p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Transparencia</h5>
                <p><i class="fa fa-file-alt me-2"></i><a href="../info_legal/Derechos.php" class="text-white">Información Legal</a></p>
                <p><i class="fa fa-user-check me-2"></i><a href="../info_legal/Derechos.php" class="text-white">Derechos del pasajero</a></p>
                <p><i class="fa fa-undo-alt me-2"></i><a href="../info_legal/Derechos.php" class="text-white">Política de Devoluciones</a></p>
            </div>
        </div>
    </div>   
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="Vuelo_hotel.js"></script>

</body>
</html>