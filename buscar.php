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
    <title>Search Registers - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Search Registration</h1>
    </header>
    <main>
        <form action="validar_buscar.php" method="GET">
            <label for="titulo">Title:</label>
            <input type="text" id="titulo" name="titulo" required>
            <button type="submit">Search:</button>
        </form>
        <a href="formulario_principal.php">Back to</a>
    </main>
</body>
</html>
