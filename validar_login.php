<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $dsn = 'mysql:host=172.16.4.100;dbname=mhl_videoclub;charset=utf8mb4';
        $pdo = new PDO($dsn, 'miguel', '12345', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE username = :username AND password = :password');
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = $user['username'];
            header('Location: formulario_principal.php');
            exit();
        } else {
            echo "Credenciales incorrectas.";
        }
    } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
    }
}
?>
