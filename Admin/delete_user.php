<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['confirm_delete']) && isset($_POST['user_ID'])) {
	$user_ID = $_POST['user_ID'];
	$sql = "DELETE FROM biodata WHERE user_ID=$user_ID";

	if (mysqli_query($connection, $sql)) {
		header("Location: user_info.html");
	} else {
		echo "Error deleting record: " . mysqli_error($connection);
	}
} else if (isset($_POST['user_ID'])) {
	$user_ID = $_POST['user_ID'];
	echo "<form method='post' action='delete_user.php'>";
	echo "<input type='hidden' name='user_ID' value='$user_ID'>";
	echo "Are you sure you want to delete this user?<br>";
	echo "<input type='submit' name='confirm_delete' value='Yes'>";
	echo "<input type='submit' value='No'>";
	echo "</form>";
}

mysqli_close($connection);
?>