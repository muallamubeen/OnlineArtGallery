<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "art_gallery";

$connection = mysqli_connect($host, $user, $password, $database);

if (!$connection) {
	die("Connection failed: " . mysqli_connect_error());
}

if( isset($_POST['user_ID']) &&
    isset($_POST['FName']) &&
    isset($_POST['LName']) &&
    isset($_POST['email']) &&
    isset($_POST['user_type']) )
        {
            $user_ID = $_POST['user_ID'];
            $FName = $_POST['FName'];
            $LName = $_POST['LName'];
            $email = $_POST['email'];
            $user_type = $_POST['user_type'];
            $query = "UPDATE biodata SET FName='$FName', LName='$LName', email='$email', user_type='$user_type' WHERE user_ID=$user_ID";

        $result = $connection->query($query);
        if (!$result) echo "UPDATE failed: $query<br>" .
        $connection->error . "<br><br>";
        else 
            header("Location: user_info.html");
        
        }

echo <<<_END
<!DOCTYPE html>
<html>
    <head>
        <title>Updation Form</title>
        <link rel="stylesheet" href="../style_login.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <header style="background-color: rgb(23, 20, 65, 0.7); padding: 10px;">
        <img class="logo" src="../img/logo-1.jpg" alt="logo">
        <h1>Update User</h1>
        <a class="cta" href="artist_pro.html"></a>
    </header>
        <div class="form-block">
        <h2>UPDATE USER INFO</h2>
        <form id="contact" method="post" action="update_user.php">
            <div>
                <label for="user_ID">User_ID:</label>
                <input required="" type="text" id="user_ID" name="user_ID" placeholder="user_ID.....">
            </div>
            <div>
                <label for="first_name">Firstname:</label>
                <input required="" type="text" id="first_name" name="FName" placeholder="Firstname.....">
            </div>
            <div>
                <label for="last_name">Lastname:</label>
                <input required="" type="text" id="last_name" name="LName" placeholder="Lastname.....">
            </div>
            <div>
                <label for="contact_email">Email:</label>
                <input required="" type="email" id="contact_email" name="email">
            </div>
            <div>
                <label for="user_type">User type?</label>
                <select id="user_type" name="user_type">
                    <option value="Admin">Admin</option>
                    <option value="Artist">Artist</option>
                    <option value="Supplier">Supplier</option>
                    <option value="Customer">Customer</option>
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


mysqli_close($connection);
?>