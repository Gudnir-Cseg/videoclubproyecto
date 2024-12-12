<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Videoclub- Miguel Ángel Hidalgo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="validar_login.php" method="POST">
        <h2>Login</h2>
        <label for="username">User:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Enter</button>
    </form>
</body>
</html>
