<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM biodata";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
	echo "<tr>";
	echo "<td>" . $row['user_ID'] . "</td>";
	echo "<td>" . $row['FName'] . " " . $row['LName'] . "</td>";
	echo "<td>" . $row['email'] . "</td>";
	echo "<td>" . $row['user_type'] . "</td>";
	echo "<td>";
	echo "<form method='post' action='update_user.php'>";
	echo "<input type='hidden' name='user_ID' value='" . $row['user_ID'] . "'>";
	echo "<input type='submit' value='Update'>";
	echo "</form>";
	echo "<form method='post' action='delete_user.php'>";
	echo "<input type='hidden' name='user_ID' value='" . $row['user_ID'] . "'>";
	echo "<input type='submit' value='Delete'>";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
}
}

mysqli_close($connection);
?>