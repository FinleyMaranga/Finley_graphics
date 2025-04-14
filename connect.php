<?php
// Start session only if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'connect.php'; // Ensure correct database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);

    if ($stmt->execute()) {
        // Fetch user ID and store it in session after signup
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user'] = $firstname;
        
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
