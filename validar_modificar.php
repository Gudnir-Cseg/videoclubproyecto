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

        $stmt = $pdo->prepare('SELECT * FROM articulos WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $registro = $stmt->fetch();

        if ($registro) {
            ?>
            <form action="guardar_modificacion.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="pelicula" <?php echo ($registro['tipo'] == 'pelicula') ? 'selected' : ''; ?>>Película</option>
                    <option value="juego" <?php echo ($registro['tipo'] == 'juego') ? 'selected' : ''; ?>>Juego</option>
                </select>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($registro['titulo']); ?>" required>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($registro['descripcion']); ?></textarea>
                <label for="precio">Precio (€):</label>
                <input type="number" id="precio" name="precio" step="0.01" min="0" value="<?php echo $registro['precio']; ?>" required>
                <button type="submit">Guardar Modificación</button>
            </form>
            <?php
        } else {
            echo "No se encontró el artículo con ID $id.";
        }
    } catch (PDOException $e) {
        echo "Error al modificar el registro: " . $e->getMessage();
    }
} else {
    echo "Por favor ingresa un ID válido.";
}
?>
