<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM artwork";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
	echo "<tr>";
	echo "<td>" . $row['artwork_ID'] . "</td>";
	echo "<td>" . $row['name'] ."</td>";
	echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['category'] . "</td>";
	echo "<td>";
	echo "<form method='post' action='update_artwork.php'>";
	echo "<input type='hidden' name='artwork_ID' value='" . $row['artwork_ID'] . "'>";
	echo "<input type='submit' value='Update'>";
	echo "</form>";
	echo "<form method='post' action='delete_artwork.php'>";
	echo "<input type='hidden' name='artwork_ID' value='" . $row['artwork_ID'] . "'>";
	echo "<input type='submit' value='Delete'>";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
}
}

mysqli_close($connection);
?>