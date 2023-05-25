<h2 class="text-center tm-section-title">FAQs</h2>
<p class="text-center">This section comes with Accordion tabs for different questions and answers about Simple House HTML CSS template. Thank you. #666</p>
<div class="tm-accordion">
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

    try {
        $pdo = new PDO($dsn, $user, $password);
        $stmt = $pdo->query("SELECT * FROM faq_table");

        while ($row = $stmt->fetch()) {
            echo '<button class="accordion">' . $row['question'] . '</button>';
            echo '<div class="panel">';
            echo '<p>' . $row['answer'] . '</p>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    ?>
</div>