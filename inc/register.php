<?php
$host = 'localhost';
$db = 'test';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
    $stmt->execute(['username' => $username, 'email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo 'Používateľ s týmto menom alebo e-mailovou adresou už existuje';
    } else {
        
        $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
        $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);

        echo 'Úspech! Môžete sa <a href="login.php">prihlásiť</a>  do svojho.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rergistration</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
    <h2>Registration</h2>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Registration">
    </form>
</body>
</html>
