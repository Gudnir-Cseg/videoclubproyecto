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
    <title>Delete All - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Delete All Records</h1>
    </header>
    <main>
        <form action="validar_borrar_todo.php" method="POST">
            <p>Are you sure you want to delete all records? This will not delete the tables, only the data.</p>
            <button type="submit" class="danger">Delete All Records</button>
        </form>
        <a href="formulario_principal.php">Back to</a>
    </main>
</body>
</html>
