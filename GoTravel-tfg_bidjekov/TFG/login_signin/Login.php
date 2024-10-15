<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTravel - Iniciar Sesión</title>
    <link rel="icon" href="../imagenes/Gotravel_logo.PNG" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Login.css">

</head>
<body> 

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
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
                        <span class="sr-only">(current)</span>
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

    <div class="container right-panel-active">
        <!-- Formulario de Registrarse -->
        <div class="container__form container--signup">
            <form action="#" class="form" id="form1">
                <h2 class="form__title">Registrarse</h2>
                <input type="text" placeholder="Usuario" class="input" required />
                <input type="email" placeholder="Email" class="input" required /> 
                <input type="password" placeholder="Contraseña" class="input" required />
                <button class="btn_switch">Registrarse</button>
            </form>
        </div>

        <!-- Formulario de Iniciar Sesión -->
        <div class="container__form container--signin">
            <form action="#" class="form" id="form2">
                <h2 class="form__title">Iniciar Sesión</h2>
                <input type="email" placeholder="Email" class="input" required /> 
                <input type="password" placeholder="Contraseña" class="input" required />
                <button class="btn_switch">Iniciar Sesión</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn_switch" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn_switch" id="signUp">Registrarse</button>
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
                    ¡Prepárate para una aventura inolvidable con GoTravel!</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros Servicios</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="../Index.php#home"><i class="fa fa-home mr-2"></i>Home</a>
                    <a class="text-white-50 mb-2" href="../Index.php#about-us"><i class="fa fa-info-circle mr-2"></i>Sobre Nosotros</a>
                    <a class="text-white-50 mb-2" href="../Index.php#packs"><i class="fa fa-box mr-2"></i>Packs</a>
                    <a class="text-white-50 mb-2" href="../Index.php#contact"><i class="fa fa-envelope mr-2"></i>Contacto</a>
                    <a class="text-white-50 mb-2" href="../vuelo_hotel/Vuelo_hotel.php"><i class="fa fa-plane mr-2"></i>Vuelo + Hotel</a>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contactanos</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i><a href="https://www.google.com/maps/place/C.+Viento,+1,+28220+Majadahonda,+Madrid/@40.4728071,-3.8782723,17z/data=!3m1!4b1!4m6!3m5!1s0xd41848df8092f4f:0x9994f047ccc25eac!8m2!3d40.4728071!4d-3.8756974!16s%2Fg%2F11csmg05nw?entry=ttu&g_ep=EgoyMDI0MTAwOS4wIKXMDSoASAFQAw%3D%3D" class="text-white" target="_blank">Calle Viento nº1 ,28220, Majadahonda</a></p>
                <p><i class="fa fa-phone-alt mr-2"></i><a href="tel:+0123456789" class="text-white">+0123 456 789</a></p>
                <p><i class="fa fa-envelope mr-2"></i><a href="mailto:GoTravel@gmail.com" class="text-white">GoTravel@gmail.com</a></p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Transparencia</h5>
                <p><i class="fa fa-file-alt mr-2"></i><a href="../info_legal/Derechos.php" class="text-white">Información Legal</a></p>
                <p><i class="fa fa-user-check mr-2"></i><a href="../info_legal/Derechos.php" class="text-white">Derechos del pasajero</a></p>
                <p><i class="fa fa-undo-alt mr-2"></i><a href="../info_legal/Derechos.php" class="text-white">Política de Devoluciones</a></p>
            </div>
        </div>
    </div>   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="Login.js"></script>
</body>
</html>