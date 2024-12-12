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
    <title>Main Panel - Videoclub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?> to the 2ºASIR Video Club</h1>
    </header>
    <main>
        <section class="actions">
            <form action="crear_registro.php" method="GET">
                <button type="submit">Create Register</button>
            </form>
            <form action="listar.php" method="GET">
                <button type="submit">List All (Total)</button>
            </form>
            <form action="validar_buscar.php" method="GET">
    <label for="buscar">Product search:</label>
    <input type="text" name="buscar" id="buscar" placeholder="Escribe el nombre o tipo de producto" required>
    <button type="submit">Search</button>
</form>
            <form action="filtrar.php" method="GET">
    <label for="tipo">Filter by type:</label>
    <select name="tipo" id="tipo">
        <option value="">Select type</option>
        <option value="pelicula">Film</option>
        <option value="juego">Videogame</option>
    </select>
    <button type="submit">Filter</button>
</form>
<form action="ordenar.php" method="GET">
    <label for="ordenar">Order by:</label>
    <select name="ordenar" id="ordenar">
        <option value="titulo">Title</option>
        <option value="precio">Price</option>
    </select>
    <button type="submit">Order</button>
</form>


            <form action="modificar.php" method="GET">
                <button type="submit">Modify Registers</button>
            </form>
            <form action="eliminar.php" method="GET">
                <button type="submit">Unregister</button>
            </form>


            <form action="borrar_todo.php" method="POST">
                <button type="submit">Delete All (Except Tables)</button>
            </form>
        </section>
        <section class="logout">
            <form action="logout.php" method="POST">
                <button type="submit">Log Out</button>
            </form>
        </section>
    </main>
</body>
</html>
