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
    <title>Modify Registration - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Modify Registration</h1>
    </header>
    <main>
        <form action="validar_modificar.php" method="GET">
            <label for="id">Article ID:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Search</button>
        </form>
        <a href="formulario_principal.php">Back to</a>
    </main>
</body>
</html>
