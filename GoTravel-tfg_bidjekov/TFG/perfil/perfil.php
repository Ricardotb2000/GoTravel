<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../login_signin/login.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTravel - Mi Perfil </title>

    <link rel="icon" href="../imagenes/GoTravel.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="perfil.css">

</head>
<body>
    <!-- Barra de Navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand mx-auto d-lg-block d-none" href="../index.php#home">
        <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp"
             style="width: 75px; height: 75px; border-radius: 100px;">
        <span class="brand-txt"></span>
    </a>
    <!-- Logo para la versión colapsada -->
    <a class="navbar-brand d-lg-none " href="../index.php#home">
        <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp" style="width: 50px; height: 50px; border-radius: 100px;">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Menú principal a la izquierda -->
        <ul class="navbar-nav me-auto ms-4">
            <li class="nav-item">
                <a class="nav-link" href="../index.php#home">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#about-us">
                    <i class="fas fa-info-circle"></i> Sobre Nosotros
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#packs">
                    <i class="fas fa-box"></i> Packs
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php#contact">
                    <i class="fas fa-envelope"></i> Contacto
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../vuelo_hotel/vuelo_hotel.php">
                    <i class="fas fa-plane"></i> Vuelo + Hotel
                </a>
            </li>
        </ul>

        <!-- Enlaces de Login y Carrito -->
        <ul class="navbar-nav ms-auto me-2">
            <li class="nav-item">
                <a class="nav-link" href="../login_signin/login.php">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../carrito/carrito.php">
                    <i class="fas fa-shopping-cart"></i> Carrito
                </a>
            </li>
        </ul>
    </div>
</nav>

    <div class="container mt-5 mb-5">
        <!-- Encabezado del Perfil -->
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <div class="profile-avatar">
                        <img src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" 
                             class="rounded-circle" alt="Profile">
                        <div class="edit-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <h2>Bienvenido a tu Perfil</h2>
                </div>
            </div>
        </div>

        

        <!-- Formulario de Perfil -->
        <div class="row">
            <div class="col-md-8">
                <div class="profile-section">
                    <h4 class="mb-4">Información Personal</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" placeholder="Tu nombre">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellidos</label>
                                <input type="text" class="form-control" placeholder="Tus apellidos">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="tu@email.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" placeholder="+34 600 000 000">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control mb-2" placeholder="Calle y número">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" placeholder="Tu ciudad">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Código Postal</label>
                                <input type="text" class="form-control" placeholder="28XXX">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">País</label>
                                <select class="form-select">
                                    <option selected>España</option>
                                    <option>Portugal</option>
                                    <option>Francia</option>
                                    <option>Italia</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-save">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Preferencias de Viaje -->
                <div class="profile-section">
                    <h4 class="mb-4">Preferencias de Viaje</h4>
                    <div class="travel-preferences">
                        <h6>Tipo de Viaje Favorito</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="playa" checked>
                            <label class="form-check-label" for="playa">Playa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="montaña">
                            <label class="form-check-label" for="montaña">Montaña</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cultural">
                            <label class="form-check-label" for="cultural">Cultural</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="aventura">
                            <label class="form-check-label" for="aventura">Aventura</label>
                        </div>

                        <h6 class="mt-4">Servicios Preferidos</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Desayuno incluido</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Almuerzo incluido</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Cena incluida</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Wi-Fi gratuito</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Parking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Piscina</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" id="contact" style="margin-top: 90px; text-align: center;">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="../index.php#home" class="navbar-brand">
                <h1 class="text-primary"><span class="text-white">GO</span>TRAVEL</h1>
            </a>
            <p>GoTravel ofrece experiencias de viaje auténticas y memorables. 
                Descubre destinos fascinantes y crea recuerdos inolvidables con nosotros. 
                ¡Prepárate para una aventura inolvidable con GoTravel!</p>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros Servicios</h5>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-white-50 mb-2" href="../index.php#home"><i class="fa fa-home me-2"></i>Home</a>
                <a class="text-white-50 mb-2" href="../index.php#about-us"><i class="fa fa-info-circle me-2"></i>Sobre Nosotros</a>
                <a class="text-white-50 mb-2" href="../index.php#packs"><i class="fa fa-box me-2"></i>Packs</a>
                <a class="text-white-50 mb-2" href="../index.php#contact"><i class="fa fa-envelope me-2"></i>Contacto</a>
                <a class="text-white-50 mb-2" href="vuelo_hotel/vuelo_hotel.php"><i class="fa fa-plane me-2"></i>Vuelo + Hotel</a>
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
            <p><i class="fa fa-file-alt me-2"></i><a href="../info_legal/derechos.php" class="text-white">Información Legal</a></p>
            <p><i class="fa fa-user-check me-2"></i><a href="../info_legal/derechos.php" class="text-white">Derechos del pasajero</a></p>
            <p><i class="fa fa-undo-alt me-2"></i><a href="../info_legal/derechos.php" class="text-white">Política de Devoluciones</a></p>
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="perfil.js"></script>
</body>
</html>