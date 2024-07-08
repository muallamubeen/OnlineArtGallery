<?php
$host_name = "localhost";
$db_name = "art_gallery";
$username = "root";
$password = "";
$conn = new mysqli($host_name, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if( isset($_POST['artwork_ID']) &&
    isset($_POST['name']) &&
    isset($_POST['description']) &&
    isset($_POST['price']) &&    
    isset($_POST['category']) )
        {
            $art_ID = $_POST['artwork_ID'];
            $Name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $query = "UPDATE artwork SET name='$Name', 	description='$description', price='$price', category='$category' WHERE artwork_ID=$art_ID";
            $result = $conn->query($query);

            if (!$result){
                echo "UPDATE failed: $query<br>" . $connection->error . "<br><br>";
            }   else {
                header("Location: art_info.html");
            }
        }

echo <<<_END
<!DOCTYPE html>
<html>
<head>
	<title>Add Artwork</title>
    <link rel="stylesheet" href="../style_login.css">
    <link rel="stylesheet" href="../css/style.css">

    </head>
<body>
    <header style="background-color: rgb(23, 20, 65, 0.7); padding: 10px;">
        <img class="logo" src="../img/logo-1.jpg" alt="logo">
        <h1>Update Artwork</h1>
        <a class="cta" href="artist_pro.html"></a>
    </header>
    <div class="form-block">
    <form id="contact" method="post" action="update_artwork.php">
            <div>
                <label for="artwork_ID">Artwork_ID:</label>
                <input required="" type="text" id="artwork_ID" name="artwork_ID" placeholder="user_ID.....">
            </div>
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"  required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required style="color:black"></textarea>
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" " required>
            </div>
            <div>
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="ABSTRACT" >ABSTRACT</option>
                <option value="LANDSCAPE" >LANDSCAPE</option>
                <option value="CALLIGRAPHY" >CALLIGRAPHY</option>
                <option value="DRAWING" >DRAWING</option>
                <option value="CERAMIC" >CERAMIC</option>
                <option value="NATURE PHOTOGRAPHY" >NATURE PHOTOGRAPHY</option>
                <option value="STILL LIFE" >STILL LIFE</option>
            </select>
            </div>
            <div id="contact_submit">
                <button type="submit">SUBMIT</button>
            </div>
</form> 
    </div>
</body>
</html>

_END;

mysqli_close($conn);
?>