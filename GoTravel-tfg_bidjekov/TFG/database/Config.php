<?php
// Config.php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
$password = "123456"; // Cambia esto por tu contraseña de la base de datos
$dbname = "gotravel"; // Cambia esto por el nombre de tu base de datos

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>