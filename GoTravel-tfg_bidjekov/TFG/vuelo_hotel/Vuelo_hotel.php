<?php
session_start();
require_once '../database/Config.php'; // Asegúrate de tener la configuración de conexión aquí

// Inicializa los resultados como un array vacío
$results = [];

// Procesar la solicitud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'destino' y 'tipo_estancia' están definidos
    if (isset($_POST['destino']) && isset($_POST['tipo_estancia'])) {
        $id_origen = $_POST['destino']; 
        $tipo_estancia = $_POST['tipo_estancia'];

        // Comprobar si 'id_origen' es un número válido
        if (!is_numeric($id_origen) || $id_origen <= 0) {
            echo "ID de destino no válido.";
            exit();
        }

        // Consulta según el tipo de estancia
        if ($tipo_estancia == 'hotel') {
            // Consulta para obtener hoteles
            $query = "SELECT h.Nombre, h.Precio_Por_Noche AS Precio, h.Descripción, d.Ciudad
                      FROM hotel h 
                      JOIN destino d ON h.Destino_ID = d.Destino_ID 
                      WHERE d.Destino_ID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_origen);
            if ($stmt->execute()) {
                $results['hotel'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            } else {
                echo 'Error en la consulta de hoteles: ' . $stmt->error;
                exit();
            }

        } elseif ($tipo_estancia == 'vuelo') {
            // Consulta para obtener vuelos desde el país de origen con el nombre de las ciudades
            $query = "SELECT d_origen.Ciudad AS Ciudad_Origen, d_destino.Ciudad AS Ciudad_Destino, 
                             v.Precio, v.Fecha_Salida, v.Fecha_Llegada 
                      FROM vuelo v 
                      JOIN destino d_origen ON v.Origen_ID = d_origen.Destino_ID 
                      JOIN destino d_destino ON v.Destino_ID = d_destino.Destino_ID 
                      WHERE v.Origen_ID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_origen);
            if ($stmt->execute()) {
                $results['vuelo'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            } else {
                echo 'Error en la consulta de vuelos: ' . $stmt->error;
                exit();
            }

        } elseif ($tipo_estancia == 'vuelo_hotel') {
            // Consulta para obtener ambos (hoteles y vuelos)
            $hotel_query = "SELECT h.Nombre, h.Precio_Por_Noche AS Precio, h.Descripción, d.Ciudad 
                            FROM hotel h 
                            JOIN destino d ON h.Destino_ID = d.Destino_ID 
                            WHERE d.Destino_ID = ?";
            $flight_query = "SELECT d_origen.Ciudad AS Ciudad_Origen, d_destino.Ciudad AS Ciudad_Destino, 
                                        v.Precio, v.Fecha_Salida, v.Fecha_Llegada 
                             FROM vuelo v 
                             JOIN destino d_origen ON v.Origen_ID = d_origen.Destino_ID 
                             JOIN destino d_destino ON v.Destino_ID = d_destino.Destino_ID 
                             WHERE v.Origen_ID = ?";

            // Obtener hoteles
            $hotel_stmt = $conn->prepare($hotel_query);
            $hotel_stmt->bind_param("i", $id_origen);
            if ($hotel_stmt->execute()) {
                $results['hotel'] = $hotel_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            } else {
                echo 'Error en la consulta de hoteles: ' . $hotel_stmt->error;
                exit();
            }

            // Obtener vuelos
            $flight_stmt = $conn->prepare($flight_query);
            $flight_stmt->bind_param("i", $id_origen);
            if ($flight_stmt->execute()) {
                $results['vuelo'] = $flight_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            } else {
                echo 'Error en la consulta de vuelos: ' . $flight_stmt->error;
                exit();
            }
        }

        // Guardar resultados en la sesión para mostrarlos más adelante
        $_SESSION['search_results'] = $results;

        // Redirigir a la misma página para mostrar resultados
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo 'Faltan parámetros en el formulario.';
        exit();
    }
}

// Comprobar si hay resultados en la sesión
if (isset($_SESSION['search_results'])) {
    $results = $_SESSION['search_results'];
    unset($_SESSION['search_results']); // Limpiar los resultados de la sesión
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTravel - Hotel</title>

<link rel="icon" href="../imagenes/GoTravel.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.css" />
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

        <!-- Logo para la versión colapsada -->
        <a class="navbar-brand d-lg-none " href="../Index.php#home">
            <img src="../imagenes/GoTravel.png" class="brand-img" alt="Gotravel_logo_transp" style="width: 50px; height: 50px; border-radius: 100px;">
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
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="../imagenes/Carrusel-4.jpg" alt="Imagen">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3 container-title" style="max-width: 900px; margin-bottom: 25%;">
                        <h4 class="text-white text-uppercase mb-3">Descubre el mundo a tu manera</h4>
                        <h3 class="display-3 text-white mb-md-4">Aventuras únicas en cada rincón del planeta</h3>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="../imagenes/Carrusel-5.jpg" alt="Imagen">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3 container-title" style="max-width: 900px; margin-bottom: 25%;">
                        <h4 class="text-white text-uppercase mb-3">Explora más allá de tus sueños</h4>
                        <h3 class="display-3 text-white mb-md-4">Lugares inimaginables a tu alcance</h3>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="../imagenes/Carrusel-7.jpg" alt="Imagen">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3 container-title" style="max-width: 900px; margin-bottom: 25%;">
                        <h4 class="text-white text-uppercase mb-3">Vive momentos inolvidables</h4>
                        <h3 class="display-3 text-white mb-md-4">Viajes para conectar con lo extraordinario</h3>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-bs-slide="prev"></a>
        <a class="carousel-control-next" href="#header-carousel" data-bs-slide="next"></a>
    </div>
</div>

    <!-- Iniciar Reserva -->
<div class="container-fluid booking mt-3 pb-5" style="position: relative; z-index: 10;" id="about-us">
    <div class="container pb-5">
        <div class="bg-light shadow p-4 rounded-3">
            <form method="POST" action="">
                <div class="row align-items-center g-3">
                    <div class="col-md-10">
                        <div class="row justify-content-center g-2">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select name="destino" class="custom-select form-select px-4" style="height: 47px; width: 100%;" required>
                                        <option selected disabled>Origen</option>
                                        <option value="1">España</option>
                                        <option value="2">Brasil</option>
                                        <option value="3">Italia</option>
                                        <option value="4">Marruecos</option>
                                        <option value="5">Bulgaria</option>
                                        <option value="6">Turquía</option>
                                        <option value="7">Japón</option>
                                        <option value="8">China</option>
                                        <option value="9">Tailandia</option>
                                        <option value="10">Grecia</option>
                                        <option value="11">Malta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select name="tipo_estancia" class="custom-select form-select px-4" style="height: 47px; width: 100%;" required>
                                        <option selected disabled>Estancia</option>
                                        <option value="hotel">Hoteles</option>
                                        <option value="vuelo">Vuelos</option>
                                        <option value="vuelo_hotel">Vuelos+Hotel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"> 
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group date" id="date1" data-target-input="nearest">
                                        <input type="text" name="departure_date" class="form-control p-4 datetimepicker-input" placeholder="Fecha ida" data-target="#date2" data-toggle="datetimepicker" style="height: 47px;" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"> 
                                <div class="mb-3 mb-md-0">
                                    <div class="input-group date" id="date2" data-target-input="nearest">
                                        <input type="text" name="return_date" class="form-control p-4 datetimepicker-input" placeholder="Fecha vuelta" data-target="#date2" data-toggle="datetimepicker" style="height: 47px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button id="search-btn" class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px; width: 100%;">Buscar</button>
                    </div>
                </div>
            </form>

            <!-- Mostrar resultados de búsqueda -->
<?php if (isset($results) && !empty($results)): ?>
    <div class="table-responsive mt-4">
        <?php if (isset($results['hotel']) && !empty($results['hotel'])): ?>
            <h4 class="mt-4">Hoteles:</h4>
            <table class="table table-striped table-hover table-borderless align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio por Noche</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results['hotel'] as $hotel): ?>
                        <tr>
                            <td><?= htmlspecialchars($hotel['Nombre']) ?></td>
                            <td><?= htmlspecialchars($hotel['Precio']) ?>€</td>
                            <td><?= htmlspecialchars($hotel['Descripción']) ?></td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm" 
                                        data-destination="<?= htmlspecialchars($hotel['Nombre']) ?>" 
                                        data-description="<?= htmlspecialchars($hotel['Descripción']) ?>" 
                                        data-price="<?= htmlspecialchars($hotel['Precio']) ?>" 
                                        data-duration="1 noche" 
                                        data-people="1" 
                                        onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <?php if (isset($results['vuelo']) && !empty($results['vuelo'])): ?>
            <h4 class="mt-4">Vuelos:</h4>
            <table class="table table-striped table-hover table-borderless align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Precio</th>
                        <th>Fecha Salida</th>
                        <th>Fecha Llegada</th>
                        <th>Duración</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results['vuelo'] as $vuelo): 
                        // Calculando la duración del vuelo
                        $fechaSalida = new DateTime($vuelo['Fecha_Salida']);
                        $fechaLlegada = new DateTime($vuelo['Fecha_Llegada']);
                        $duracion = $fechaLlegada->diff($fechaSalida);
                        $duracionFormateada = $duracion->format('%h horas %i minutos');
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($vuelo['Ciudad_Origen']) ?></td>
                            <td><?= htmlspecialchars($vuelo['Ciudad_Destino']) ?></td>
                            <td><?= htmlspecialchars(number_format($vuelo['Precio'], 2)) ?>€</td>
                            <td><?= htmlspecialchars($vuelo['Fecha_Salida']) ?></td>
                            <td><?= htmlspecialchars($vuelo['Fecha_Llegada']) ?></td>
                            <td><?= htmlspecialchars($duracionFormateada) ?></td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm" 
                                        data-destination="<?= htmlspecialchars($vuelo['Ciudad_Destino']) ?>" 
                                        data-description="Vuelo de <?= htmlspecialchars($vuelo['Ciudad_Origen']) ?> a <?= htmlspecialchars($vuelo['Ciudad_Destino']) ?>" 
                                        data-price="<?= htmlspecialchars($vuelo['Precio']) ?>" 
                                        data-duration="<?= htmlspecialchars($duracionFormateada) ?>" 
                                        data-people="1" 
                                        onclick="addToCart(this)">
                                    Reservar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php else: ?>
<?php endif; ?>
</div>
</div>
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
                                    data-description="Hotel de Lujo 5 estrellas Imperial Resort en Sunny Beach" 
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
                                    data-description="Hotel de Lujo 5 estrellas GrandHotel & Resort en Cluj-Napoca" 
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
                                    data-description="Hotel de Lujo 4 estrellas Riad Dar en Marrakech"   
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
                                    data-description="Hotel de Lujo 5 estrellas Concorde Deluxe Resort en Antalya"   
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
                                    data-description="Hotel de Lujo 4 estrellas GrandBeijing en Pekín"  
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
                                    data-description="Hotel de Lujo 4 estrellas Villa Fontaine en Tokio"  
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
<div id="airlinesCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 65%; margin: 0 auto;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-flex justify-content-center">
                <a href="https://www.ryanair.com" target="_blank">
                    <img src="../imagenes/Ryanair.png" class="d-block airline-img" alt="Ryanair">
                </a>
                <a href="https://www.vueling.com" target="_blank">
                    <img src="../imagenes/Vueling.png" class="d-block airline-img" alt="Vueling">
                </a>
                <a href="https://www.iberia.com" target="_blank">
                    <img src="../imagenes/Iberia.png" class="d-block airline-img" alt="Iberia">
                </a>
                <a href="https://www.aireuropa.com" target="_blank">
                    <img src="../imagenes/AirEuropa.png" class="d-block airline-img" alt="Air Europa">
                </a>
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-flex justify-content-center">
                <a href="https://www.easyjet.com" target="_blank">
                    <img src="../imagenes/EasyJet.png" class="d-block airline-img" alt="EasyJet">
                </a>
                <a href="http://www.airnostrum.es/" target="_blank">
                    <img src="../imagenes/AirNostrum.png" class="d-block airline-img" alt="Air Nostrum">
                </a>
                <a href="https://www.eurowings.com" target="_blank">
                    <img src="../imagenes/Eurowings.png" class="d-block airline-img" alt="Eurowings">
                </a>
                <a href="https://www.jet2.com" target="_blank">
                    <img src="../imagenes/Jet2.png" class="d-block airline-img" alt="Jet2">
                </a>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="Vuelo_hotel.js"></script>

</body>
</html>