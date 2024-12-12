<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $dsn = 'mysql:host=172.16.4.100;dbname=mhl_videoclub;charset=utf8mb4';
        $pdo = new PDO($dsn, 'miguel', '12345', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $stmt = $pdo->prepare('DELETE FROM articulos WHERE id = :id');
        $stmt->execute(['id' => $id]);

        echo "Registro eliminado con éxito.";
        echo '<br><a href="formulario_principal.php">Volver al panel principal</a>';
    } catch (PDOException $e) {
        echo "Error al eliminar el registro: " . $e->getMessage();
    }
} else {
    echo "Por favor ingresa un ID válido para eliminar.";
}
?>
