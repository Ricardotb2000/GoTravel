<?php
// Config.php
$servername = "localhost"; 
$username = "root"; 
$password = "123456"; 
$dbname = "gotravel"; 

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>