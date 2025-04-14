<?php
session_start();
include 'db.php'; // Ensure database connection

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    echo "<p class='text-danger'>Access denied. Please log in as an admin.</p>";
    exit();
}

// Fetch messages from the database
$query = "SELECT name, email, message, created_at FROM messages ORDER BY created_at DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<h3 class='text-primary'>User Messages</h3><hr>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='table-dark'><tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['message']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }

    echo "</tbody></table></div>";
} else {
    echo "<p class='text-warning'>No messages found.</p>";
}
?>
