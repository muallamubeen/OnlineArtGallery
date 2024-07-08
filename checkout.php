<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    $host_name = "localhost";
    $db_name = "art_gallery";
    $username = "root";
    $password = "";
    $conn = new mysqli($host_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    echo <<<_END
    <!DOCTYPE html>
    <html>
    <head>
        <title>Thank You</title>
        <link rel="stylesheet"  href="css/style.css">
        <style>
        h1{
            color: #ebbb55;
            margin: 50px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            text-align: center;
        }
        button {
            text-align: center;
            width: 15%;
        }
        </style>
    </head>
    _END;
   

    $query = "SELECT * FROM cart WHERE user_ID = '$user_id'";
    $result = $conn->query($query);
    if ($result->num_rows > 0){
    $invoice = "<h1 style='font-size:20px;margin:0 20px'>Invoice</h1>";
    $invoice .= "<table>";
    $invoice .= "<tr><th>Item Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";

    $total = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $artwork_id = $row['artwork_id'];

        $stmt2 = $conn->prepare("SELECT * FROM artwork WHERE artwork_ID = ?");
        $stmt2->bind_param("i", $artwork_id);
        $stmt2->execute();
        $artwork = $stmt2->get_result()->fetch_assoc();

            $item_name = $artwork['name'];
            $price = $artwork['price'];
            $quantity = $row['quantity'];
            $subtotal = $price * $quantity;
            $total += $subtotal;

            $invoice .= "<tr>";
            $invoice .= "<td>$item_name</td>";
            $invoice .= "<td>\$$price</td>";
            $invoice .= "<td>$quantity</td>";
            $invoice .= "<td>\$$subtotal</td>";
            $invoice .= "</tr>";
        }
    }

    $invoice .= "</table>";
    $invoice .= "<p style='font-size:20px;margin:0 20px'>Total: \$$total</p>";

    $query = "DELETE FROM cart WHERE user_ID = '$user_id'";
    $conn->query($query);

    $conn->close();

echo <<<_END
<body>
    <h1>Thank you for your purchase!</h1>
    $invoice
    <p>Your order has been processed and your items will be shipped to you shortly.</p>
    <button><a href="home.html">Continue Shopping</a></button>
</body>
</html>
_END;
}
else {
    echo <<<_END
<body>
    <h1>Welcome to DREAMS AND BRUSHSTROKES!</h1>
    <h1>No items found in your cart.</h1>
    <h1>To proceed with checkout add Artworks to your chart.</h1>
    <p>Continue shopping with us!</p>
    <button><a href="home.html">Continue Shopping</a></button>
</body>
</html>
_END;
}