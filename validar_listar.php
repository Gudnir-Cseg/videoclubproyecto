<?php
session_start();


if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


require_once 'conexion.php';


$query = "SELECT id, nombre, tipo, precio FROM productos"; 
$resultado = $pdo->query($query);
$totalArticulos = $resultado->rowCount();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Películas y Juegos - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Listado de Películas y Juegos</h1>
    </header>
    <main>
        <p>Total de artículos: <?php echo $totalArticulos; ?></p>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($totalArticulos > 0) {
                    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
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

        <br>
        <a href="formulario_principal.php">Volver al menú principal</a>
    </main>
</body>
</html>
