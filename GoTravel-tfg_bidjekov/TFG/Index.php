<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTravel - Inicio</title>

    <link rel="icon" href="imagenes/GoTravel.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index/Index.css">

</head>
<body>

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand mx-auto d-lg-block d-none" href="#">
            <img src="imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp" style="width: 75px; height: 75px; border-radius: 100px;">
            <span class="brand-txt"></span>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menú principal a la izquierda -->
            <ul class="navbar-nav me-auto ms-4">
                <li class="nav-item">
                    <a class="nav-link" href="#home">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-us">
                        <i class="fas fa-info-circle"></i> Sobre Nosotros
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#packs">
                        <i class="fas fa-box"></i> Packs
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        <i class="fas fa-envelope"></i> Contacto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vuelo_hotel/Vuelo_hotel.php">
                        <i class="fas fa-plane"></i> Vuelo + Hotel
                    </a>
                </li>
            </ul>

            <!-- Enlaces de Sign In y Carrito -->
            <ul class="navbar-nav ms-auto me-2">
                <li class="nav-item">
                    <a class="nav-link" href="login_signin/Login.php">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrito/Carrito.php">
                        <i class="fas fa-shopping-cart"></i> Carrito
                    </a>
                </li>
            </ul>
        </div>
    </nav>

        <!-- Contador de reservas -->
        <a class="nav-link" id="cartIcon" href="#" onclick="incrementCounter(event)">
            <i class="fas fa-shopping-cart"></i> 
            <span id="cartCount" class="badge badge-light">0</span>
        </a>

        <!-- Carousel -->
        <div class="container-fluid p-0" id="home">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="imagenes/Carrusel-1.jpg" alt="Imagen">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px; margin-bottom: 35%; text-decoration: solid;">
                                <h4 class="text-white text-uppercase mb-md-3">Prueba y descubre</h4>
                                <h1 class="display-3 text-white mb-md-4">¿Vamos de paseo por el mundo?</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="imagenes/Carrusel-2.jpg" alt="Imagen">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px; margin-bottom: 35%; text-decoration: solid;">
                                <h4 class="text-white text-uppercase mb-md-3">Viajes increíbles</h4>
                                <h1 class="display-3 text-white mb-md-4">Destinos Turísticos para recordar</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="imagenes/Carrusel-3.jpg" alt="Imagen">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px; margin-bottom: 35%; text-decoration: solid;">
                                <h4 class="text-white text-uppercase mb-md-3">Experiencias Inolvidables</h4>
                                <h1 class="display-3 text-white mb-md-4">Disfruta de la aventura</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </div>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </div>
                </button>
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

        <!-- About us -->
        <div id="about-us" class="container-fluid wow fadeIn" id="about" data-wow-duration="1.5s" style="margin-top: -8%;">
            <div class="row">
                <div class="col-lg-6 has-img-bg" style="display: flex; align-items: center;">
                    <img src="imagenes/pixelcut-export.png" alt="Descripción de la imagen" class="img-fluid" style="height: auto; width: auto;">
                </div>
                <div class="col-lg-6" style="display: flex; align-items: center;">
                    <div class="row justify-content-center">
                        <div class="col-sm-8 py-5 my-5">
                        <h2 class="text-primary"><span class="text-dark">GO</span>TRAVEL</h2>
                            <p>En GoTravel, estamos dedicados a hacer realidad tus sueños de viaje más emocionantes y memorables. 
                                Somos mucho más que una simple agencia de viajes; somos tus compañeros de aventura, 
                                tus guías expertos y tus socios en la exploración del mundo.</p>
                            
                            <p><b>Nuestro objetivo es ofrecerte experiencias de viaje únicas y auténticas que te permitan 
                                descubrir destinos fascinantes, sumergirte en nuevas culturas y crear recuerdos inolvidables 
                                que durarán toda la vida. Ya sea que estés buscando unas vacaciones relajantes en una playa paradisíaca, 
                                una emocionante aventura en la naturaleza salvaje o una escapada urbana llena de cultura y gastronomía, 
                                tenemos la escapada perfecta para ti.</b></p>
                            
                            <p>Con una amplia gama de destinos, desde exóticos rincones del mundo hasta clásicos favoritos de vacaciones, 
                                y una variedad de opciones de viaje que van desde viajes en grupo organizados hasta itinerarios personalizados, 
                                estamos aquí para ayudarte a planificar y disfrutar del viaje de tus sueños.</p>
                            
                            <p><b>En GoTravel, creemos en el poder transformador del viaje para enriquecer nuestras vidas, ampliar nuestros horizontes 
                                y conectarnos con el mundo que nos rodea. Únete a nosotros en esta emocionante aventura y descubre todo lo que el mundo 
                                tiene para ofrecer.</b></p>
                            
                            <p>¡Prepárate para vivir la aventura de tu vida con GoTravel!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Packs de Viaje -->
        <div class="container-fluid py-5" id="packs">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packs de Viaje</h6>
                    <h1>Tours Recomendados</h1>
                </div>

                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Bulgaria.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Bulgaria</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>3 días</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Descubre El país de los montañeros - Bulgaria</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">600€</h5>
                                        <button onclick="incrementCounter(event)" class="btn btn-primary btn-sm">Reservar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Card 2 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Italia.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Italia</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>2 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>1 Persona</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Sumérgete en la belleza eterna de un Imperio- Italia</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">345€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Card 3 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Marruecos.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Marruecos</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>4 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Vibrante mezcla de culturas, colores y sabores - Marruecos</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">650€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Card 4 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Turquia.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Turquía</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>7 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Embárcate en un viaje a través de los siglos - Turquía</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">1025€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Card 5 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/China.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>China</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>5 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>1 Persona</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Explora la fascinante diversidad y cultura - China</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">569€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Card 6 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Japon.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Japón</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>6 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Donde la tradición se entrelaza con la vanguardia - Japón</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">910€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 7 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Tailandia.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Tailandia</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>6 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>1 Personas</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Tierra de templos sagrados y playas exóticas - Tailandia</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">515€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>                </div>

                    <!-- Card 8 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Malta.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Malta</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>4 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>2 Personas</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Un crisol de culturas bajo el sol del Mediterráneo - Malta</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">885€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 9 -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="imagenes/Grecia.jpg" alt="Imagen">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Grecia</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary me-2"></i>5 dias</small>
                                    <small class="m-0"><i class="fa fa-user text-primary me-2"></i>1 Personas</small>
                                </div>
                                <a class="h5 text-decoration-none" href="">Los mitos cobran vida en paisajes de ensueño - Grecia</a>
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">499€</h5>
                                        <a href="#" class="btn btn-primary btn-sm">Reservar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- chatbot -->
        <div class="chatbot-button" id="chatbotButton">
            <i class="fa fa-comments"></i>
        </div>

        <div class="chatbot-popup" id="chatbotPopup">
            <div class="chatbot-header">
                <h5>
                    <i class="fa fa-robot" style="color: #ffffff;"></i> Asistente Go-Bot
                    <span id="closeChatbot" style="float: right; cursor: pointer;">&times;</span>
                </h5>
            </div>
            <div class="chatbot-body">
                <p>Hola, ¿en qué puedo ayudarte hoy?</p>
                <input type="text" placeholder="Escribe tu mensaje..." />
            </div>
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
                        ¡Prepárate para una aventura inolvidable con GoTravel!</p>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros Servicios</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#home"><i class="fa fa-home me-2"></i>Home</a>
                        <a class="text-white-50 mb-2" href="#about-us"><i class="fa fa-info-circle me-2"></i>Sobre Nosotros</a>
                        <a class="text-white-50 mb-2" href="#packs"><i class="fa fa-box me-2"></i>Packs</a>
                        <a class="text-white-50 mb-2" href="#contact"><i class="fa fa-envelope me-2"></i>Contacto</a>
                        <a class="text-white-50 mb-2" href="vuelo_hotel/Vuelo_hotel.php"><i class="fa fa-plane me-2"></i>Vuelo + Hotel</a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contáctanos</h5>
                    <p><i class="fa fa-map-marker-alt me-2"></i><a href="https://www.google.com/maps/place/C.+Viento,+1,+28220+Majadahonda,+Madrid/@40.4728071,-3.8782723,17z/data=!3m1!4b1!4m6!3m5!1s0xd41848df8092f4f:0x9994f047ccc25eac!8m2!3d40.4728071!4d-3.8756974!16s%2Fg%2F11csmg05nw?entry=ttu&g_ep=EgoyMDI0MTAwOS4wIKXMDSoASAFQAw%3D%3D" class="text-white" target="_blank">Calle Viento nº1 ,28220, Majadahonda</a></p>
                    <p><i class="fa fa-phone-alt me-2"></i><a href="tel:+0123456789" class="text-white">+0123 456 789</a></p>
                    <p><i class="fa fa-envelope me-2"></i><a href="mailto:GoTravel@gmail.com" class="text-white" target="_blank">GoTravel@gmail.com</a></p>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Transparencia</h5>
                    <p><i class="fa fa-file-alt me-2"></i><a href="info_legal/Derechos.php" class="text-white">Información Legal</a></p>
                    <p><i class="fa fa-user-check me-2"></i><a href="info_legal/Derechos.php" class="text-white">Derechos del pasajero</a></p>
                    <p><i class="fa fa-undo-alt me-2"></i><a href="info_legal/Derechos.php" class="text-white">Política de Devoluciones</a></p>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="index/Index.js"></script>
    
</body>
</html>
