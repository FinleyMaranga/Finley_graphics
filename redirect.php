<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to course dashboard
    header("Location: dashboard.php");
    exit();
} else {
    // Redirect to signup or login page
    header("Location: signup.php");
    exit();
}
?>
