<?php
session_start();

// Manejar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Leer los datos enviados como JSON
    $packageData = json_decode(file_get_contents('php://input'), true);

    // Verificar si se está intentando añadir un paquete al carrito
    if (isset($packageData['destination'])) {
        // Extraer los valores asegurando que existen
        $destination = $packageData['destination'] ?? null;
        $description = $packageData['description'] ?? null;
        $duration = $packageData['duration'] ?? null;
        $people = $packageData['people'] ?? null;
        $price = $packageData['price'] ?? null;

        // Añadir el paquete al carrito (guardar en la sesión)
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = [
            'destination' => $destination,
            'description' => $description,
            'duration' => $duration,
            'people' => $people,
            'price' => $price
        ];

        // Responder con el estado del carrito
        echo json_encode(['message' => 'Paquete añadido al carrito', 'cart' => $_SESSION['cart']]);
        exit();
    }

    // Lógica para validar el código promocional
    if (isset($packageData['promo_code'])) {
        $promo_code = trim($packageData['promo_code']);
        $discount = 0;

        // Verificar el código promocional
        if ($promo_code === 'gotravel2024') {
            $discount = 0.20; // 20% de descuento
        } else {
            echo json_encode(['error' => 'El código no existe']);
            exit();
        }

        // Calcular el nuevo total con descuento
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'];
        }

        $discounted_total = $total * (1 - $discount);
        echo json_encode(['total' => number_format($discounted_total, 2)]);
        exit();
    }
}

// Calcular el subtotal, IVA y total para mostrar en la interfaz
$total = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'];
    }
}

$iva_percentage = 21; // Porcentaje de IVA
$subtotal = $total / (1 + ($iva_percentage / 100)); // Precio sin IVA
$iva_amount = $total - $subtotal; // Cantidad de IVA
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTravel - Carrito</title>

    <link rel="icon" href="../imagenes/GoTravel.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Carrito.css">
</head>
<body>

<!-- Barra de Navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand mx-auto d-lg-block d-none" href="../Index.php#home">
        <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp"
             style="width: 75px; height: 75px; border-radius: 100px;">
        <span class="brand-txt"></span>
    </a>
    <!-- Logo para la versión colapsada -->
    <a class="navbar-brand d-lg-none " href="../Index.php#home">
        <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp" style="width: 50px; height: 50px; border-radius: 100px;">
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

        <!-- Enlaces de Login y Carrito -->
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

<!-- Contenedor principal del carrito -->
<div class="container mt-5 pt-5">

    <!-- Título del carrito -->
    <h2 class="cart-title text-center my-4">Tus Reservas</h2>

    <!-- Tabla de productos en el carrito -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Destino</th>
                    <th>Descripción</th>
                    <th>Duración</th>
                    <th>Personas</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <?php
                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    echo "<tr><td colspan='6' class='text-center'>No hay productos en el carrito.</td></tr>";
                } else {
                    foreach ($_SESSION['cart'] as $index => $item) {
                        echo "<tr data-index='$index'>
                                <td>{$item['destination']}</td>
                                <td>{$item['description']}</td>
                                <td>{$item['duration']}</td>
                                <td>{$item['people']}</td>
                                <td id='price-{$index}'>{$item['price']}€</td>
                                <td>
                                    <div class='d-flex align-items-center'>
                                        <input type='number' class='form-control mx-2' value='1' min='1' id='quantity-{$index}' style='width: 50px;' readonly>
                                        <button class='btn btn-danger btn-sm mx-2' onclick='removeItem($index)'>Eliminar</button>
                                    </div>
                                </td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Código promocional y total del carrito -->
<div class="row mt-4">
    <!-- Código promocional -->
    <div class="col-md-6 mb-3">
        <div class="bg-dark p-3 rounded">
            <input type="text" id="promo_code" placeholder="Introduce tu código promocional" class="form-control mb-2">
            <button class="btn btn-success w-100" id="apply_code">Aplicar Código</button>
        </div>
    </div>

    <!-- Cálculo del subtotal, IVA y total -->
    <div class="col-md-6 mb-3">
        <div class="bg-dark p-3 rounded text-end text-white" id="cart-total">
            <?php
            echo "<div><strong>Subtotal:</strong> " . number_format($subtotal, 2) . " €</div>";
            echo "<div><strong>IVA ({$iva_percentage}%):</strong> " . number_format($iva_amount, 2) . " €</div>";
            echo "<div class='text-primary'><strong>Total:</strong> " . number_format($total, 2) . " €</div>";
            ?>
        </div>
    </div>
</div>

    <!-- Botón de checkout -->
    <div class="text-end">
        <a href="../checkout/checkout.php" class="btn btn-primary btn-lg px-5 py-3" style="border-radius: 30px;">Proceder al Pago</a>
    </div>
</div>


<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" id="contact" style="margin-top: 90px; text-align: center;">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="../Index.php#home" class="navbar-brand">
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
<script src="Carrito.js"></script>
</body>
</html>