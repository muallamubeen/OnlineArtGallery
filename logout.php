<?php
    session_start();

    // Remove the authentication data from the session
    unset($_SESSION['user_id']);

    // Redirect to the login page after successful logout
    header('Location: login.html');
?>