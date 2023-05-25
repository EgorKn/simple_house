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

$stmt = $pdo->query('SELECT * FROM menu');
$menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($menuItems as $menuItem) : ?>
	<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
		<figure>
			<img src="<?php echo $menuItem['image']; ?>" alt="Image" class="img-fluid tm-gallery-img" />
			<figcaption>
				<h4 class="tm-gallery-title"><?php echo $menuItem['name']; ?></h4>
				<p class="tm-gallery-description"><?php echo $menuItem['description']; ?></p>
				<p class="tm-gallery-price">$<?php echo $menuItem['price']; ?></p>
			</figcaption>
		</figure>
	</article>
<?php endforeach; ?>
