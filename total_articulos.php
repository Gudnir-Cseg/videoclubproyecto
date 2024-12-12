<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Articles - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Total Articles</h1>
    </header>
    <main>
        <form action="validar_total_articulos.php" method="GET">
            <button type="submit">View Total Articles</button>
        </form>
        <a href="formulario_principal.php">Back to</a>
    </main>
</body>
</html>
