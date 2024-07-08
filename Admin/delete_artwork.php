<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['confirm_delete']) && isset($_POST['artwork_ID'])) {
	$artwork_ID = $_POST['artwork_ID'];
	$sql = "DELETE FROM artwork WHERE artwork_ID=$artwork_ID";

	if (mysqli_query($connection, $sql)) {
		header("Location: art_info.html");
	} else {
		echo "Error deleting record: " . mysqli_error($connection);
	}
} else if (isset($_POST['artwork_ID'])) {
	$artwork_ID = $_POST['artwork_ID'];
	echo "<form method='post' action='delete_artwork.php'>";
	echo "<input type='hidden' name='artwork_ID' value='$artwork_ID'>";
	echo "Are you sure you want to delete this artwork?<br>";
	echo "<input type='submit' name='confirm_delete' value='Yes'>";
	echo "<input type='submit' value='No'>";
	echo "</form>";
}

mysqli_close($connection);
?>