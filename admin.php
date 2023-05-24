<link href="css/adm.css" rel="stylesheet" />
<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Porucha pripojenia : ' . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['cost'];
    $image = $_POST['image'];

    $query = "INSERT INTO menu (name, description, cost, image) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $description, $price, $image]);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM menu WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
}

$query = "SELECT * FROM menu";
$stmt = $db->query($query);
$portfolio = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>

    <h2>Pridať do menu</h2>
    <form method="POST" action="">
        <label for="name">Nazov:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="price">Cena:</label>
        <input type="text" name="price" id="price" required><br>

        <label for="description">Popis:</label>
        <textarea name="description" id="description" required></textarea><br>


        <label for="image">Obrazok:</label>
        <input type="text" name="image" id="image" required><br>

        <button type="submit">Pridat</button>
    </form>

    <h2>Ovládanie menu</h2>
    <table>
        <tr>
            <th>Nazov</th>
            <th>Cena</th>
            <th>Popis</th>
            <th>Cena</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($portfolio as $item): ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['cost'] ?></td>
                <td><?= $item['description'] ?></td>
                <td><img src="<?= $item['image'] ?>" width="100"></td>
                <td><a href="?delete=<?= $item['id'] ?>">Odstraniť</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
