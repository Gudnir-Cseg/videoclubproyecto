<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

try {
    $dsn = 'mysql:host=172.16.4.100;dbname=mhl_videoclub;charset=utf8mb4';
    $pdo = new PDO($dsn, 'miguel', '123456789', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $stmt = $pdo->query('SELECT COUNT(*) AS total FROM articulos');
    $resultado = $stmt->fetch();

    if ($resultado) {
        echo "<h2>Total de Artículos: " . $resultado['total'] . "</h2>";
    } else {
        echo "No se pudieron obtener los resultados.";
    }
} catch (PDOException $e) {
    echo "Error al obtener el total de artículos: " . $e->getMessage();
}
?>
