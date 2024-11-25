<?php
session_start(); // Inicia la sesión
include '../database/config.php'; // Incluye el archivo de conexión a la base de datos

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ''; // Inicializa la variable para mensajes

// Depuración: Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar el registro
if (isset($_POST['registro'])) {
    // Verificar que los datos POST estén disponibles
    if (isset($_POST['Email'], $_POST['Contraseña'])) {
        $email = $_POST['Email'];  // Se obtiene el email
        $contraseña = $_POST['Contraseña'];  // Se obtiene la contraseña
        
        // Depuración: Verificar los valores de las variables
        echo "<pre>"; var_dump($email, $contraseña); echo "</pre>";  // Muestra los datos recibidos por el formulario

        // Verificar si el email ya existe
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE Email = ?"); // Consultamos la tabla 'usuario'
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Depuración: Verificar el resultado de la consulta
        echo "<pre>"; var_dump($result); echo "</pre>";  // Muestra el resultado de la consulta para verificar que estamos obteniendo datos

        if ($result->num_rows > 0) {
            $message = "<script>alert('El email ya está en uso.');</script>";
        } else {
            // Insertar el nuevo usuario con la contraseña hash
            $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuario (Email, Contraseña) VALUES (?, ?)"); 
            $stmt->bind_param("ss", $email, $hashedPassword); // Solo insertamos email y contraseña

            // Depuración: Verificar si la consulta INSERT se ejecuta correctamente
            if ($stmt->execute()) {
                // Verificar si la inserción afectó filas
                if ($stmt->affected_rows > 0) {
                    $_SESSION['registrado'] = true;
                    $_SESSION['Email'] = $email; // Usar el email para la sesión
                    $message = "<script>alert('Registro exitoso. Redirigiendo...'); window.location.href='../index.php';</script>";
                } else {
                    $message = "<script>alert('No se pudo registrar el usuario.');</script>";
                }
            } else {
                // Mostrar el error específico de la inserción
                $message = "<script>alert('Error al registrar el usuario: " . $stmt->error . "');</script>";
            }
        }
    } else {
        $message = "<script>alert('Los datos del formulario no fueron enviados correctamente.');</script>";
    }
}

// Manejar el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['Contraseña'];

    // Depuración: Verificar los valores de las variables de inicio de sesión
    echo "<pre>"; var_dump($email, $password); echo "</pre>";  // Muestra los datos recibidos por el formulario

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT Usuario_ID, Contraseña FROM usuario WHERE Email = ?"); 
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Depuración: Verificar el resultado de la consulta de inicio de sesión
    echo "<pre>"; var_dump($result); echo "</pre>";  // Muestra el resultado de la consulta para verificar que se encuentra el usuario

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verifica la contraseña usando password_verify
        if (password_verify($password, $usuario['Contraseña'])) { // Verificamos la contraseña
            // Establecer la sesión
            $_SESSION['registrado'] = true;
            $_SESSION['Email'] = $email; // Usar el email para la sesión
            $message = "<script>alert('Inicio de sesión exitoso. Redirigiendo...'); window.location.href='../index.php';</script>";
        } else {
            $message = "<script>alert('Contraseña incorrecta.');</script>";
        }
    } else {
        $message = "<script>alert('No se encontró un usuario con ese email.');</script>";
    }
}

echo $message; // Imprime el mensaje de la alerta en la página
?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTravel - Iniciar Sesión</title>
    <link rel="icon" href="../imagenes/GoTravel.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">

</head>
<body> 

    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand mx-auto d-lg-block d-none" href="../index.php#home">
            <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp" style="width: 75px; height: 75px; border-radius: 100px;">
            <span class="brand-txt visually-hidden">GoTravel</span>
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
                        <span class="visually-hidden">(current)</span>
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

            <!-- Enlaces de Sign In y Carrito a la derecha -->
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

    <div class="container right-panel-active">
    <!-- Formulario de Registrarse -->
    <div class="container__form container--signup">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" id="form1">
            <h2 class="form__title">Registrarse</h2>
            <input type="email" name="Email" placeholder="Email" class="input" id="Email" required /> 
            <input type="password" name="Contraseña" placeholder="Contraseña" class="input" id="Password" required />
            <button type="submit" name="registro" class="btn_switch">Registrarse</button> <!-- Cambiar 'register' por 'registro' -->
            <!-- Mensaje de registro -->
            <?php if (strpos($message, 'Registro') !== false || strpos($message, 'email') !== false): ?>
                <div class="message-container"><?php echo $message; ?></div>
            <?php endif; ?>
        </form>
    </div>

    <!-- Formulario de Iniciar Sesión -->
    <div class="container__form container--signin">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" id="form2">
            <h2 class="form__title">Iniciar Sesión</h2>
            <input type="email" name="Email" placeholder="Email" class="input" required />
            <input type="password" name="Contraseña" placeholder="Contraseña" class="input" required />
            <button type="submit" name="login" class="btn_switch">Iniciar Sesión</button>
            <!-- Mensaje de inicio de sesión -->
            <?php if (strpos($message, 'Inicio de sesión') !== false || strpos($message, 'incorrecta') !== false): ?>
                <div class="message-container"><?php echo $message; ?></div>
            <?php endif; ?>
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
                    <a class="text-white-50 mb-2" href="../vuelo_hotel/vuelo_hotel.php"><i class="fa fa-plane me-2"></i>Vuelo + Hotel</a>

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
                <p><i class="fa fa-file-alt me-2"></i><a href="../info_legal/derechos.php" class="text-white">Información Legal</a></p>
                <p><i class="fa fa-user-check me-2"></i><a href="../info_legal/derechos.php" class="text-white">Derechos del pasajero</a></p>
                <p><i class="fa fa-undo-alt me-2"></i><a href="../info_legal/derechos.php" class="text-white">Política de Devoluciones</a></p>
            </div>
        </div>
    </div>   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="login.js"></script>
    
</body>
</html>
