<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTravel - Políticas</title>
    <link rel="icon" href="../imagenes/Gotravel_logo.PNG" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">

    <style>
        body {
            background:url(../imagenes/Arena.jpg);
        }
        .mt-custom {
            margin-top: 10%; 
        }

        .text-white-50 a {
        text-decoration: none; /* Sin subrayado por defecto */
        color: rgba(255, 255, 255, 0.5); /* Color de texto */
        }

        .text-white-50 a:hover {
        text-decoration: underline; /* Subrayado al pasar el ratón */
        color: white; /* Cambiar el color si es necesario */
        }
    </style>
</head>
<body>
    
      <!-- Barra de Navegación -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <a class="navbar-brand mx-auto d-lg-block d-none" href="../Index.php#home">
            <img src="../imagenes/Gotravel_logo.PNG" class="brand-img" alt="Gotravel_logo_transp" style="width: 75px; height: 75px; border-radius: 100px;">
            <span class="brand-txt"></span>
        </a>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Menú principal a la izquierda -->
            <ul class="navbar-nav me-auto ms-4">
                <li class="nav-item">
                    <a class="nav-link" href="../Index.php#home">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Index.php#about-us">
                        <i class="fas fa-info-circle"></i> Sobre Nosotros
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Index.php#packs">
                        <i class="fas fa-box"></i> Packs
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Index.php#contact">
                        <i class="fas fa-envelope"></i> Contacto
                    </a>
                </li>
                <li class="nav-item">
                      <a class="nav-link" href="../vuelo_hotel/Vuelo_hotel.php">
                          <i class="fas fa-plane"></i> Vuelo + Hotel
                      </a>
                  </li>
            </ul>
            
            <!-- Enlaces de Sign In y Carrito -->
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

         <!-- Transparencia -->
        <div class="container mt-custom" >
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Transparencia <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                        <div class="card-body">
                            En nuestra agencia de viajes, valoramos profundamente la transparencia. Nos aseguramos de que todos los clientes reciban información clara y precisa en todas las etapas del proceso de reserva. Esto incluye detalles sobre precios, impuestos, políticas de cancelación, modificaciones y cualquier posible costo adicional. Nuestro objetivo es garantizar que los pasajeros estén completamente informados antes de tomar decisiones, evitando sorpresas inesperadas. La transparencia también se extiende a la comunicación de posibles incidencias, retrasos o cambios en los itinerarios. Buscamos que la relación con nuestros clientes esté basada en la confianza mutua.
                            <br><br>
                            Además, proporcionamos información detallada sobre los términos y condiciones de cada servicio antes de que el cliente realice una reserva, asegurándonos de que todas las políticas, incluidos los derechos y responsabilidades del pasajero, sean claras y fáciles de entender.
                        </div>
                    </div>
                </div>

                <!-- Información Legal -->
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Información Legal <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                        <div class="card-body">
                            Cumplimos con todas las leyes y regulaciones aplicables en el ámbito de los viajes y el transporte de pasajeros, incluyendo la normativa vigente en materia de protección de datos, consumo y derechos de los pasajeros. Al hacer uso de nuestros servicios, los clientes pueden tener la certeza de que todas las transacciones están debidamente protegidas por leyes internacionales y locales.
                        </div>
                    </div>
                </div>

                <!-- Derechos del Pasajero -->
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Derechos del Pasajero <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                        <div class="card-body">
                            Los derechos de los pasajeros son una parte fundamental de nuestros compromisos. Conforme al Reglamento (CE) N.º 261/2004, todos los pasajeros tienen derecho a recibir compensación por vuelos cancelados, retrasados o en los que se les haya denegado el embarque.
                        </div>
                    </div>
                </div>

                <!-- Política de Devoluciones -->
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Política de Devoluciones <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
                        <div class="card-body">
                            Ofrecemos una política de devoluciones clara y flexible, diseñada para adaptarse a las necesidades de nuestros clientes. En el caso de cancelaciones, brindamos varias opciones que incluyen reembolsos completos, cambios de fecha o crédito para futuros viajes, dependiendo del tipo de servicio contratado.
                        </div>
                    </div>
                </div>

                <!-- Condiciones de Transporte -->
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Condiciones de Transporte <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
                        <div class="card-body">
                            Las condiciones de transporte son fundamentales para garantizar un viaje seguro y agradable. Nuestros clientes deben estar informados sobre las normas de equipaje, horarios, y cualquier restricción que pueda afectar su viaje. Los clientes son responsables de llegar a tiempo al aeropuerto o estación y cumplir con todas las normativas de seguridad.
                        </div>
                    </div>
                </div>

                <!-- Modificaciones y Cancelaciones -->
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Modificaciones y Cancelaciones <i class="fas fa-chevron-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#accordion">
                        <div class="card-body">
                            En caso de que un cliente necesite realizar cambios en su reserva, se recomienda contactar con nosotros lo antes posible. Las políticas de modificación varían según el proveedor del servicio, y haremos todo lo posible para atender la solicitud del cliente. Las cancelaciones se gestionan de acuerdo con la política correspondiente, la cual será informada claramente al momento de la reserva.
                        </div>
                    </div>
                </div>
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
                        ¡Prepárate para una aventura inolvidable con GoTravel</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros Servicios</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="../Index.php#home"><i class="fa fa-home me-2"></i>Home</a>
                        <a class="text-white-50 mb-2" href="../Index.php#about-us"><i class="fa fa-info-circle me-2"></i>Sobre Nosotros</a>
                        <a class="text-white-50 mb-2" href="../Index.php#packs"><i class="fa fa-box me-2"></i>Packs</a>
                        <a class="text-white-50 mb-2" href="../Index.php#contact"><i class="fa fa-envelope me-2"></i>Contacto</a>
                        <a class="text-white-50 mb-2" href="../vuelo_hotel/Vuelo_hotel.php"><i class="fa fa-plane me-2"></i>Vuelo + Hotel</a>

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
                    <p><i class="fa fa-file-alt me-2"></i><a href="#" class="text-white">Información Legal</a></p>
                    <p><i class="fa fa-user-check me-2"></i><a href="#" class="text-white">Derechos del pasajero</a></p>
                    <p><i class="fa fa-undo-alt me-2"></i><a href="#" class="text-white">Política de Devoluciones</a></p>
                </div>
            </div>
        </div>  

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
