<?php
    $host_name = "localhost";
    $db_name = "art_gallery";
    $username = "root";
    $password = "";
    $conn = new mysqli($host_name, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $email = htmlspecialchars(get_post($conn, 'email'));
        $password = htmlspecialchars(get_post($conn, 'password'));

        if (empty($email) || empty($password)){
            header("Location: login.html");
        }

        $query = "SELECT * FROM biodata WHERE email = '$email'";
        $result = $conn->query($query);
       
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password == $user['password'] && $email == $user['email']) {
                session_start();
                $_SESSION['user_type'] = $user['user_type']; // store user type in session
                    if ($user['user_type'] == 'Admin') {
                        $_SESSION['user_id'] = $user['user_ID'];
                        header("Location: Admin/user_info.html"); // redirect to admin page for admin users
                    } elseif ($user['user_type'] == 'Artist') {
                        $_SESSION['user_id'] = $user['user_ID'];
                        header("Location: artist_pro.html"); // redirect to admin page for admin users
                    } else {
                        $_SESSION['user_id'] = $user['user_ID'];
                        header("Location: home.html"); // redirect to home page for regular users
                    }
            } else {  
                header("Location: login.html");
                }
        } else {
            echo "No User Found!";
        }
    }
    else{
    header("Location: login.html"); 
    $conn->close();
    }
    function get_post($connection, $var)
    {
        return $connection->real_escape_string($_POST[$var]);
    }
?>

