<?php
$host_name = "localhost";
$db_name = "art_gallery";
$username = "root";
$password = "";

$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
// load_cart.php
session_start();
header('Content-Type: application/json');

$user = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $Total = 0; $count = 0;
    while($row = $result->fetch_assoc()) {
        $artwork_id = $row['artwork_id'];

        $stmt2 = $conn->prepare("SELECT * FROM artwork WHERE artwork_ID = ?");
        $stmt2->bind_param("i", $artwork_id);
        $stmt2->execute();
        $artwork = $stmt2->get_result()->fetch_assoc();

        echo "<tr>";
        echo "<td>". $artwork["name"] . "<img class='gImg' src='" . $artwork["image_url"] . "'>" . "</td>";
        echo "<td>" . $artwork['category'] . "</td>";
        echo "<td>PKR " . $artwork['price'] . "</td>";
        echo "<td><button onclick='addToCart(" . $user . ", " . $artwork_id . ", 1)'>+</button></td>";
        echo "<td style='text-align:center;'>" . $row['quantity'] . "</td>";
        echo "<td><button onclick='removeFromCart(" . $user . ", " . $artwork_id . ")'>-</button></td>";
        echo "<td>PKR " . ($artwork['price'] * $row['quantity']) . "</td>";
        echo "</tr>";
        $count += $row['quantity'];
        $Total += ($artwork['price'] * $row['quantity']);
    }
    echo <<<_END
            <tr>
            <th colspan='4'>
            <th colspan='2'>Total Count</th>
            <th>NET AMOUNT</th>
            </tr>
            <tr>
            <td colspan='4' style='font-size:20px'></td>
            <td colspan='2' style='text-align:center;font-size:20px'> $count </td>
            <td colspan='' style='font-size:20px'>PKR  $Total </td>
            </tr>
    _END;

} else {
    echo "<tr><td colspan='7'>Your cart is empty</td>";
}
?>