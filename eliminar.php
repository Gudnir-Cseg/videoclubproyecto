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
    <title>Unregister - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Unregister</h1>
    </header>
    <main>
        <form action="validar_eliminar.php" method="GET">
            <label for="id">ID of the item to be deleted:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Delete</button>
        </form>
        <a href="formulario_principal.php">Back to</a>
    </main>
</body>
</html>
