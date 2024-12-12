<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once 'conexion.php';

$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : ''; 


if (empty($buscar)) {
    echo "Por favor ingrese un término de búsqueda.";
    exit();
}


$query = "SELECT id, titulo, tipo, precio FROM articulos WHERE titulo LIKE :buscar OR tipo LIKE :buscar";
$stmt = $pdo->prepare($query);
$buscar_param = "%" . $buscar . "%"; 
$stmt->bindParam(':buscar', $buscar_param, PDO::PARAM_STR);
$stmt->execute();

$totalArticulos = $stmt->rowCount(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Search Results</h1>
    </header>
    <main>
        <p>Total items found: <?php echo $totalArticulos; ?></p>

        <?php if ($totalArticulos > 0): ?>
            <table border="1" cellspacing="0" cellpadding="10">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                            <td><?php echo number_format($row['precio'], 2, ',', '.'); ?> €</td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No products were found matching your search.</p>
        <?php endif; ?>

        <a href="formulario_principal.php">Back to main menu</a>
    </main>
</body>
</html>
