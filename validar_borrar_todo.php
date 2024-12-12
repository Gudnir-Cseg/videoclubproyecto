<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $dsn = 'mysql:host=172.16.4.100;dbname=mhl_videoclub;charset=utf8mb4';
        $pdo = new PDO($dsn, 'miguel', '12345', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        
        $stmt = $pdo->prepare('DELETE FROM articulos');
        $stmt->execute();

        echo "Todos los registros han sido eliminados.";
        echo '<br><a href="formulario_principal.php">Volver al panel principal</a>';
    } catch (PDOException $e) {
        echo "Error al borrar los registros: " . $e->getMessage();
    }
} else {
    echo "Acceso no permitido.";
}
?>
