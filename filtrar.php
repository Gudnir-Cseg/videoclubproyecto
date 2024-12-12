<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once 'conexion.php';

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : ''; 

$query = "SELECT id, titulo, tipo, precio FROM articulos";
if ($tipo != '') {
    $query .= " WHERE tipo = :tipo"; 
}

$stmt = $pdo->prepare($query);
if ($tipo != '') {
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
}
$stmt->execute();

$totalArticulos = $stmt->rowCount();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of filtered products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>List of filtered products</h1>
    </header>
    <main>
        <p>Total number of items: <?php echo $totalArticulos; ?></p>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($totalArticulos > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['titulo'] . "</td>";
                        echo "<td>" . $row['tipo'] . "</td>";
                        echo "<td>" . $row['precio'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay productos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="formulario_principal.php">Back to main menu</a>
    </main>
</body>
</html>
