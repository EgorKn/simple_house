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

if (isset($_POST['add-menu'])) {
    $name = $_POST['menu-name'];
    $description = $_POST['menu-description'];
    $price = $_POST['menu-price'];
    $image = $_POST['menu-image'];

    $stmt = $pdo->prepare("INSERT INTO menu (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $image]);

    echo "Dish added!";
}

if (isset($_POST['add-employee'])) {
    $name = $_POST['employee-name'];
    $position = $_POST['employee-position'];
    $description = $_POST['employee-description'];
    $image = $_POST['employee-image'];

    $stmt = $pdo->prepare("INSERT INTO employee (name, position, description, img) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $position, $description, $image]);

    echo "Employee added!";
}

if (isset($_POST['add-faq'])) {
    $question = $_POST['faq-question'];
    $answer = $_POST['faq-answer'];

    $stmt = $pdo->prepare("INSERT INTO faq_table (question, answer) VALUES (?, ?)");
    $stmt->execute([$question, $answer]);

    echo "FAQ added!";
}

if (isset($_POST['delete-menu'])) {
    $id = $_POST['menu-id'];

    $stmt = $pdo->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->execute([$id]);

    echo "Dish added!";
}

if (isset($_POST['delete-employee'])) {
    $id = $_POST['employee-id'];

    $stmt = $pdo->prepare("DELETE FROM employee WHERE id = ?");
    $stmt->execute([$id]);

    echo "Employee deleted!";
}

if (isset($_POST['delete-faq'])) {
    $id = $_POST['faq-id'];

    $stmt = $pdo->prepare("DELETE FROM faq_table WHERE id = ?");
    $stmt->execute([$id]);

    echo "FAQ deleted!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel administrátora</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    <h1>Panel administrátora</h1>
    <h2>Menu</h2>
    <form action="admin.php" method="post">
        <label for="menu-name">Name:</label>
        <input type="text" id="menu-name" name="menu-name" required><br>

        <label for="menu-description">Description:</label>
        <input type="text" id="menu-description" name="menu-description" required><br>

        <label for="menu-price">Price:</label>
        <input type="text" id="menu-price" name="menu-price" required><br>

        <label for="menu-image">Img:</label>
        <input type="text" id="menu-image" name="menu-image" required><br>

        <input type="submit" name="add-menu" value="Add dish">
    </form>

    <h2>Employees</h2>
    <form action="admin.php" method="post">
        <label for="employee-name">Name:</label>
        <input type="text" id="employee-name" name="employee-name" required><br>

        <label for="employee-position">Position:</label>
        <input type="text" id="employee-position" name="employee-position" required><br>

        <label for="employee-description">Description:</label>
        <input type="text" id="employee-description" name="employee-description" required><br>

        <label for="employee-image">Img:</label>
        <input type="text" id="employee-image" name="employee-image" required><br>

        <input type="submit" name="add-employee" value="Add employee">
    </form>

    <h2>FAQ</h2>
    <form action="admin.php" method="post">
        <label for="faq-question">Question:</label>
        <input type="text" id="faq-question" name="faq-question" required><br>

        <label for="faq-answer">Answer:</label>
        <input type="text" id="faq-answer" name="faq-answer" required><br>

        <input type="submit" name="add-faq" value="Добавить FAQ">
    </form>

    <h2>Deleting</h2>
    <?php
    $stmt = $pdo->query('SELECT * FROM menu');
    $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($menuItems as $menuItem) {
        echo '<div>';
        echo '<p><strong>Name: </strong>' . $menuItem['name'] . '</p>';
        echo '<p><strong>Description: </strong>' . $menuItem['description'] . '</p>';
        echo '<p><strong>Price: </strong>' . $menuItem['price'] . '</p>';
        echo '<p><strong>Img: </strong>' . $menuItem['image'] . '</p>';


        echo '<form action="admin.php" method="post">';
        echo '<input type="hidden" name="menu-id" value="' . $menuItem['id'] . '">';
        echo '<input type="submit" name="delete-menu" value="Delete">';
        echo '</form>';

        echo '</div>';
        echo '<hr>';
    }
    ?>

    <h2>Employees</h2>
    <?php
    $stmt = $pdo->query('SELECT * FROM employee');
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($employees as $employee) {
        echo '<div>';
        echo '<p><strong>Name: </strong>' . $employee['name'] . '</p>';
        echo '<p><strong>Position: </strong>' . $employee['position'] . '</p>';
        echo '<p><strong>Description: </strong>' . $employee['description'] . '</p>';
        echo '<p><strong>Img: </strong>' . $employee['img'] . '</p>';

        echo '<form action="admin.php" method="post">';
        echo '<input type="hidden" name="employee-id" value="' . $employee['id'] . '">';
        echo '<input type="submit" name="delete-employee" value="Delete">';
        echo '</form>';

        echo '</div>';
        echo '<hr>';
    }
    ?>

    <h2>FAQ</h2>
    <?php
    $stmt = $pdo->query('SELECT * FROM faq_table');
    $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($faqs as $faq) {
        echo '<div>';
        echo '<p><strong>Question: </strong>' . $faq['question'] . '</p>';
        echo '<p><strong>Answer: </strong>' . $faq['answer'] . '</p>';

        echo '<form action="admin.php" method="post">';
        echo '<input type="hidden" name="faq-id" value="' . $faq['id'] . '">';
        echo '<input type="submit" name="delete-faq" value="Delete">';
        echo '</form>';

        echo '</div>';
        echo '<hr>';
    }
    ?>

</body>
</html>
