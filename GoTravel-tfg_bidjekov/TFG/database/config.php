<?php
// config.php
$servername = "PMYSQL180.dns-servicio.com:3306"; 
$username = "ricardo"; 
$password = "Gotravel2024!"; 
$dbname = "10674643_gotravel"; 


// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>