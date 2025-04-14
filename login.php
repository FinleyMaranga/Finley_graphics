<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['firstname'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href='index.php';</script>";
    }
}
?>
