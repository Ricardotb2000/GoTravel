<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('fpdf186/fpdf.php');
require('PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/src/SMTP.php');
require('PHPMailer-master/src/Exception.php');

// Verificar que el usuario está registrado
if (!isset($_SESSION['registrado'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no registrado']);
    exit();
}

// Conectar a la base de datos
include '../database/config.php';

// Obtener datos del usuario
$email = $_SESSION['Email'];
$stmt = $conn->prepare("SELECT Nombre, Apellido, Telefono, Direccion, Email FROM usuario WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo json_encode(['success' => false, 'message' => 'Usuario no encontrado en la base de datos']);
    exit();
}

// Verificar si el carrito está vacío
if (empty($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'El carrito está vacío']);
    exit();
}

$cart = $_SESSION['cart'];

// Generar número de factura
$invoiceNumber = strtoupper(uniqid("FACT-"));

class PDF extends FPDF
{
    function CheckPageBreak($h)
    {
        // Si la altura h causará un desbordamiento, se añade una nueva página
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }
    }

    function MultiCellRow($widths, $data, $border = 1, $aligns = [])
    {
        $nb = 0;
        foreach ($data as $i => $cell) {
            $nb = max($nb, $this->NbLines($widths[$i], $cell));
        }
        $h = 8 * $nb; // Altura ajustada por número de líneas
        $this->CheckPageBreak($h);

        foreach ($data as $i => $cell) {
            $w = $widths[$i];
            $a = isset($aligns[$i]) ? $aligns[$i] : 'L';
            $x = $this->GetX();
            $y = $this->GetY();
            $this->Rect($x, $y, $w, $h, $border);
            $this->MultiCell($w, 8, $this->cleanText($cell), 0, $a);
            $this->SetXY($x + $w, $y);
        }
        $this->Ln($h);
    }

    function cleanText($text)
    {
        // Limpiar el texto de caracteres problemáticos y convertirlo a UTF-8
        $text = mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8');
        $text = str_replace('€', 'EUR', $text); // Cambiar el símbolo del euro por "EUR"
        return $text;
    }

    function NbLines($w, $txt)
    {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ') $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) $i++;
                } else $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else $i++;
        }
        return $nl;
    }
}

// Crear un nuevo PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Agregar logo
$logoPath = '../imagenes/Gotravel_logo.PNG'; // Cambiar por la ruta real del logo
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, 10, 10, 30);
}
$pdf->Ln(20);

// Encabezado
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Factura', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Numero de Factura: ' . $invoiceNumber, 0, 1, 'C');
$pdf->Ln(10);

// Información del cliente
$pdf->Cell(0, 10, 'Cliente: ' . $user['Nombre'] . ' ' . $user['Apellido'], 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $user['Email'], 0, 1);
$pdf->Cell(0, 10, 'Telefono: ' . $user['Telefono'], 0, 1);
$pdf->Cell(0, 10, 'Direccion: ' . $user['Direccion'], 0, 1);
$pdf->Ln(10);

// Tabla de productos
$pdf->SetFont('Arial', 'B', 12);
$widths = [60, 70, 30, 30];
$pdf->MultiCellRow($widths, [
    'Destino',
    'Descripcion',
    'Precio (EUR)',
    'Fecha'
], 1, ['C', 'C', 'C', 'C']);
$pdf->SetFont('Arial', '', 12);
$total = 0;

foreach ($cart as $item) {
    $name = $item['destination'] ?? 'N/A';
    $description = $item['description'] ?? 'N/A';
    $price = number_format($item['price'] ?? 0, 2, '.', ',') . ' EUR';
    $date = date('Y-m-d');

    $pdf->MultiCellRow($widths, [
        $name, 
        $description, 
        $price, 
        $date
    ], 1, ['L', 'L', 'R', 'C']);
    $total += $item['price'];
}

// Total
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(130, 10, 'Total', 1);
$pdf->Cell(30, 10, number_format($total, 2, '.', ',') . ' EUR', 1, 0, 'R');
$pdf->Ln(20);

// Guardar y enviar el PDF
$pdfFile = 'factura_' . $user['Email'] . '.pdf';
$pdf->Output('F', $pdfFile);

// Enviar correo con PHPMailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.servidor-correo.net'; 
$mail->SMTPAuth = true;
$mail->Username = 'factura.pagos@gotravel.cat'; 
$mail->Password = 'Perlaypaula1'; 
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

// Información del remitente y destinatario
$mail->setFrom('factura.pagos@gotravel.cat', 'GoTravel');
$mail->addAddress($user['Email'], $user['Nombre'] . ' ' . $user['Apellido']);
$mail->Subject = 'Tu Factura de Compra';

// Cuerpo del correo
$mail->isHTML(true);
$mail->Body = '<h1>Factura de Compra</h1><p>Adjunto encontrarás tu factura. Gracias por confiar en nosotros.</p>';
$mail->addAttachment($pdfFile); // Adjuntar el PDF

// Enviar el correo
if (!$mail->send()) {
    echo json_encode(['success' => false, 'message' => 'Error al enviar el correo: ' . $mail->ErrorInfo]);
} else {
    echo json_encode(['success' => true, 'message' => 'Correo enviado correctamente.']);
}

// Eliminar el PDF
unlink($pdfFile);

exit();
?>
