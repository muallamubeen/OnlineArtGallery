<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}
session_start();

$user_ID = $_SESSION['user_id'];
$sql = "SELECT * FROM biodata WHERE user_ID = $user_ID";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
	echo "<tr>";
	echo "<h2>User ID:      " . $row['user_ID'] . "</h2>";
	echo "<h3>Name:       " . $row['FName'] . " " . $row['LName'] . "</h3>";
	echo "<h3>Email:        " . $row['email'] . "</h3>";
	echo "<h3>User_Type:        " . $row['user_type'] . "</h3>";
	echo "<h3>";
	echo "</tr>";
}
}

mysqli_close($connection);
?>