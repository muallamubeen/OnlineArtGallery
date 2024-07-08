<?php 
    $db_hostname = 'localhost';
    $db_database = 'art_gallery';
    $db_username = 'root';
    $db_password = '';
   
    $connection =
    new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($connection->connect_error) die($connection->connect_error);
        
    if( isset($_POST['FName']) &&
    isset($_POST['LName']) &&
    isset($_POST['email']) &&
    isset($_POST['password'])&&
    isset($_POST['user_type']) )
        {
            $FName = htmlspecialchars(get_post($connection, 'FName'));
            $LName = htmlspecialchars(get_post($connection, 'LName'));
            $email = htmlspecialchars(get_post($connection, 'email'));
            $password = htmlspecialchars(get_post($connection, 'password'));
            $user_type = htmlspecialchars(get_post($connection, 'user_type'));
        
            if (empty($FName) || empty($LName) || empty($email) || empty($password)){
                header("Location: signup.html");
            }
            $query = "SELECT * FROM biodata WHERE email = '$email'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if ($email == $user['email']) {
                    header("Location: signup.php");
                    echo $email . " is already in use!";
                    $connection->close();
                }
            }
            $query = "SELECT * FROM biodata WHERE email = '$email'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if ($email == $user['email']) {
                    header("Location: signup.php");
                    echo $email . " is already in use!";
                    $connection->close();
                }
            }

        $query = "INSERT INTO biodata VALUES" .
        "('', '$FName', '$LName', '$email', '$password', '$user_type')";
        
        $result = $connection->query($query);
        if (!$result) echo "INSERT failed: $query<br>" .
        $connection->error . "<br><br>";
        $connection->close();

        header("Location: login.html");
        }
        else {
            header("Location: signup.html");
        }

    function get_post($connection, $var)
    {
        return $connection->real_escape_string($_POST[$var]);
    }
?>
