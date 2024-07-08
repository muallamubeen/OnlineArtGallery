<?php
$host_name = "localhost";
$db_name = "art_gallery";
$username = "root";
$password = "";

$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
session_start();

if(isset($_POST['user_id']) && isset($_POST['artwork_id'])) {
    $user_id = $_POST['user_id'];
    $artwork_id = $_POST['artwork_id'];

    // Use parameterized query to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND artwork_id = ?");
$stmt->bind_param("ii", $user_id, $artwork_id);
$stmt->execute();
$result = $stmt->get_result();

// Remove the specified artwork from the user's cart
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_quantity = $row['quantity'];

    if ($current_quantity > 1) {
        $quantity = 1; // Decrease quantity by 1
        $stmt = $conn->prepare("UPDATE cart SET quantity = quantity - ? WHERE user_id = ? AND artwork_id = ?");
        $stmt->bind_param("iii", $quantity, $user_id, $artwork_id);
    } else {
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND artwork_id = ?");
        $stmt->bind_param("ii", $user_id, $artwork_id);
    }
}
        
    if($stmt->execute()) {
        echo "Item removed from cart successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
} else {
    echo "Missing parameters";
}

$conn->close();
?>