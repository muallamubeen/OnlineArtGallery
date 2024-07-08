<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art_gallery";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$image = $_POST['image'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];

#$target_dir = "img/";
#$target_file = $target_dir . basename($_POST['image']);

#move_uploaded_file( $_POST['image'], $target_file);

$stmt = $conn->prepare("INSERT INTO artwork (name, image_url, description, price, category) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $image, $description, $price, $category);

if ($stmt->execute()) {
	echo "New artwork added successfully!";
} else {
	echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
