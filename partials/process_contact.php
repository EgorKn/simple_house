<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $dsn = new mysqli($servername, $username, $password, $dbname);
    if (!$dsn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "INSERT INTO review (name, email, message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($dsn, $query)) {
        echo "Thank you for your message!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($dsn);
    }


    mysqli_close($dsn);
}
?>
