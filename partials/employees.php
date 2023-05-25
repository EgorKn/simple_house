<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employee";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $position = $row['position'];
        $description = $row['description'];
        $img = $row['img'];
?>

	<article class="col-lg-6">
		<figure class="tm-person">
			<img src="img/<?php echo $img; ?>" alt="Image" class="img-fluid tm-person-img" />
			<figcaption class="tm-person-description">
				<h4 class="tm-person-name"><?php echo $name; ?></h4>
				<p class="tm-person-title"><?php echo $position; ?></p>
				<p class="tm-person-about"><?php echo $description; ?></p>
			</figcaption>
		</figure>
	</article>

<?php
    }
} else {
    echo "No employees found.";
}
$conn->close();
?>
