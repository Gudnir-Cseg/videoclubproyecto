<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    try {
        $dsn = 'mysql:host=172.16.4.100;dbname=mhl_videoclub;charset=utf8mb4';
        $pdo = new PDO($dsn, 'miguel', '12345', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $stmt = $pdo->prepare('UPDATE articulos SET tipo = :tipo, titulo = :titulo, descripcion = :descripcion, precio = :precio WHERE id = :id');
        $stmt->execute([
            'id' => $id,
            'tipo' => $tipo,
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'precio' => $precio,
        ]);

        echo "Registro modificado con éxito.";
        echo '<br><a href="formulario_principal.php">Volver al panel principal</a>';
    } catch (PDOException $e) {
        echo "Error al modificar el registro: " . $e->getMessage();
    }
} else {
    echo "Acceso no permitido.";
}
?>
