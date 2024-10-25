<?php
session_start();
require('fpdf/fpdf.php'); // Asegúrate de que la ruta es correcta

// Verifica que el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirigir si no está logueado
    exit();
}

// Conectar a la base de datos
include('db_connection.php'); // Cambia esto según tu conexión

// Recoger datos del usuario
$user_id = $_SESSION['user_id'];
$query = "SELECT First_name, Second_name, Email FROM users WHERE User_ID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Recoger datos del carrito
$cart = $_SESSION['cart'];

// Crear un nuevo PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Título de la factura
$pdf->Cell(0, 10, 'Factura', 0, 1, 'C');

// Información del usuario
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Cliente: ' . $user['First_name'] . ' ' . $user['Second_name'], 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $user['Email'], 0, 1);
$pdf->Ln(10); // Espacio

// Encabezado de la tabla de productos
$pdf->Cell(60, 10, 'Producto', 1);
$pdf->Cell(40, 10, 'Descripción', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Cell(30, 10, 'Fecha de Compra', 1);
$pdf->Ln();

// Añadir los productos al PDF
foreach ($cart as $item) {
    $pdf->Cell(60, 10, $item['name'], 1);
    $pdf->Cell(40, 10, $item['description'], 1);
    $pdf->Cell(30, 10, $item['price'] . '€', 1);
    $pdf->Cell(30, 10, date('Y-m-d H:i:s'), 1); // Fecha actual
    $pdf->Ln();
}

// Guardar o enviar el PDF
$pdf->Output('D', 'factura.pdf'); // 'D' para descargar

exit();
?>
