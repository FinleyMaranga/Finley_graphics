<?php
session_start();
include 'db.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize the form input
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate the input fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('All fields are required!');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address!');</script>";
    } else {
        // Insert the message into the database
        $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        
        if ($stmt->execute()) {
            echo "<script>alert('Your message has been submitted successfully.'); window.location.href='contact.php';</script>";
        } else {
            echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }
        
        // Close the prepared statement
        $stmt->close();
    }
}
?>
