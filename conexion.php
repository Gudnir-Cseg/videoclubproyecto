<?php
$host = '172.16.4.100'; 
$dbname = 'mhl_videoclub';  
$username = 'miguel';     
$password = '12345';  

try {
    // Crear una instancia PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>
