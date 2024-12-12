<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? 0;

    try {
        $dsn = 'mysql:host=172.16.4.100;dbname=mhl_videoclub;charset=utf8mb4';
        $pdo = new PDO($dsn, 'miguel', '12345', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $stmt = $pdo->prepare('INSERT INTO articulos (tipo, titulo, descripcion, precio) VALUES (:tipo, :titulo, :descripcion, :precio)');
        $stmt->execute([
            'tipo' => $tipo,
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'precio' => $precio,
        ]);

        echo "Registro creado con éxito.";
        echo '<br><a href="formulario_principal.php">Volver al panel principal</a>';
    } catch (PDOException $e) {
        echo "Error al crear el registro: " . $e->getMessage();
    }
} else {
    header('Location: crear_registro.php');
    exit();
}
?>
