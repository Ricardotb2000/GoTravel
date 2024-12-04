<?php
session_start();
if (!isset($_SESSION['registrado'])) {
    header('Location: ../login_signin/login.php');
    exit();
}

include '../database/config.php'; // Incluye el archivo de conexión a la base de datos

$email = $_SESSION['Email'];

// Recuperar los datos del usuario desde la base de datos
$stmt = $conn->prepare("SELECT Nombre, Apellido, Telefono, Direccion, Avatar FROM usuario WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$direccion = isset($user['Direccion']) ? $user['Direccion'] : '';
$direccion_partes = explode(', ', $direccion);
$calle = isset($direccion_partes[0]) ? $direccion_partes[0] : '';
$ciudad = isset($direccion_partes[1]) ? $direccion_partes[1] : '';
$codigo_postal = isset($direccion_partes[2]) ? $direccion_partes[2] : '';

// Establecer un avatar predeterminado si no hay uno
$avatar = !empty($user['Avatar']) ? $user['Avatar'] : 'data:image/jpeg;base64,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';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $calle = isset($_POST['calle']) ? $_POST['calle'] : '';
    $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
    $codigo_postal = isset($_POST['codigo_postal']) ? $_POST['codigo_postal'] : '';
    $direccion = $calle . ', ' . $ciudad . ', ' . $codigo_postal;

    // Manejar la carga de la foto de perfil
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
            $avatar = $uploadFile; // Actualizar la URL de la foto de perfil
        } else {
            echo "<script>alert('Error al subir la foto de perfil.');</script>";
        }
    }

    // Verificar si el usuario ya tiene datos en la base de datos
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Si el usuario ya existe, realizar un UPDATE
        $stmt = $conn->prepare("UPDATE usuario SET Nombre = ?, Apellido = ?, Telefono = ?, Direccion = ?, Avatar = ? WHERE Email = ?");
        $stmt->bind_param("ssssss", $nombre, $apellidos, $telefono, $direccion, $avatar, $email);
    } else {
        // Si el usuario no existe, realizar un INSERT
        $stmt = $conn->prepare("INSERT INTO usuario (Nombre, Apellido, Email, Telefono, Direccion, Avatar) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nombre, $apellidos, $email, $telefono, $direccion, $avatar);
    }

    if ($stmt->execute()) {
        header('Location: perfil.php?updated=true');
        exit();
    } else {
        echo "<script>alert('Error al actualizar los datos: " . $stmt->error . "');</script>";
    }
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
        <!-- Logo y enlaces para la versión colapsada -->
        <div class="d-lg-none ms-auto d-flex align-items-center">
            <?php if (isset($_SESSION['registrado']) && $_SESSION['registrado']): ?>
                <a class="navbar-brand" href="perfil.php">
                    <i class="fas fa-user"></i>
                </a>
                <a class="navbar-brand" href="../login_signin/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            <?php else: ?>
                <a class="navbar-brand" href="../login_signin/login.php">
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            <?php endif; ?>
            <a class="navbar-brand" href="../carrito/carrito.php">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <a class="navbar-brand" href="../index.php">
                <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp" style="width: 50px; height: 50px; border-radius: 100px;">
            </a>
        </div>

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

            <!-- Enlaces de Sign In, Carrito y Perfil a la derecha -->
            <ul class="navbar-nav ms-auto me-2">
                <?php if (isset($_SESSION['registrado']) && $_SESSION['registrado']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">
                            <i class="fas fa-user"></i> Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login_signin/logout.php">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../login_signin/login.php">
                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                        </a>
                    </li>
                <?php endif; ?>
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
                    <img src="<?= htmlspecialchars($avatar) ?>" class="rounded-circle" alt="Profile">
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
                <form action="perfil.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Tu nombre" value="<?= htmlspecialchars($user['Nombre']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Tus apellidos" value="<?= htmlspecialchars($user['Apellido']) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" name="telefono" placeholder="+34 600 000 000" value="<?= htmlspecialchars($user['Telefono']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Calle</label>
                        <input type="text" class="form-control mb-2" name="calle" placeholder="Calle y número" value="<?= htmlspecialchars($calle) ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" placeholder="Tu ciudad" value="<?= htmlspecialchars($ciudad) ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Código Postal</label>
                            <input type="text" class="form-control" name="codigo_postal" placeholder="28XXX" value="<?= htmlspecialchars($codigo_postal) ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">País</label>
                            <select class="form-select" name="pais" required>
                                <option selected>España</option>
                                <option>Portugal</option>
                                <option>Francia</option>
                                <option>Italia</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto de Perfil</label>
                        <input type="file" class="form-control" name="avatar" required>
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