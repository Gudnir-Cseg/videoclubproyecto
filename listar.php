<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Si no está logueado, redirigir al login
    exit();
}

require_once 'conexion.php'; 

// Consulta para obtener las películas
$queryPeliculas = "SELECT id, titulo, descripcion, precio FROM articulos WHERE tipo = 'pelicula'"; 
$resultadoPeliculas = $pdo->query($queryPeliculas);

// Consulta para obtener los juegos
$queryJuegos = "SELECT id, titulo, descripcion, precio FROM articulos WHERE tipo = 'juego'"; 
$resultadoJuegos = $pdo->query($queryJuegos);

// Contar el total de películas y juegos
$totalPeliculas = $resultadoPeliculas->rowCount();
$totalJuegos = $resultadoJuegos->rowCount();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Movies and Games - Videoclub</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <header>
        <h1>List Movies and Games</h1>
    </header>
    <main>
      
        <p>Total number of films: <?php echo $totalPeliculas; ?></p>
        <p>Total number of games: <?php echo $totalJuegos; ?></p>

      
        <h2>Films</h2>
        <?php if ($totalPeliculas > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultadoPeliculas->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['precio']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No films available</p>
        <?php endif; ?>

     
        <h2>Juegos</h2>
        <?php if ($totalJuegos > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultadoJuegos->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['precio']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No games available</p>
        <?php endif; ?>

        <br>
        <a href="formulario_principal.php">Back to main menu</a>
    </main>
</body>
</html>
