<?php
$host_name = "localhost";
$db_name = "art_gallery";
$username = "root";
$password = "";

$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $artwork_id = $_POST['artwork_id'];
    $quantity = $_POST['quantity'];

    if ($user_id) {
    // Check if the user already has this artwork in their cart
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND artwork_id = ?");
    $stmt->bind_param("ii", $user_id, $artwork_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the user already has this artwork in their cart, update the quantity
        $stmt = $conn->prepare("UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND artwork_id = ?");
        $stmt->bind_param("iii", $quantity, $user_id, $artwork_id);
    } else {
        // If the user does not have this artwork in their cart, insert a new row
        $stmt = $conn->prepare("INSERT INTO cart (user_id, artwork_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $artwork_id, $quantity);
    }

    if ($stmt->execute()) {
        echo "Item added to cart successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
?>
