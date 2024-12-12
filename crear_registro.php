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
    <title>Create Registration - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Create New Register</h1>
    </header>
    <main>
        <form action="validar_crear.php" method="POST">
            <label for="tipo">Type:</label>
            <select id="tipo" name="tipo" required>
                <option value="pelicula">Película</option>
                <option value="juego">Juego</option>
            </select>
            <label for="titulo">Title:</label>
            <input type="text" id="titulo" name="titulo" required>
            <label for="descripcion">Description:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <label for="precio">Price (€):</label>
            <input type="number" id="precio" name="precio" step="0.01" min="0" required>
            <button type="submit">Save</button>
        </form>
        <a href="formulario_principal.php">Back to</a>
    </main>
</body>
</html>
