<?php
session_start();
include 'db.php'; // Ensure database connection

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    echo "<p class='text-danger'>Access denied. Please log in as an admin.</p>";
    exit();
}

// Fetch all users from the database
$query = "SELECT id, CONCAT(firstname, ' ', lastname) AS name, email FROM users ORDER BY id DESC";
$result = $conn->query($query);

// Check if the query was successful
if (!$result) {
    die("<p class='text-danger'>Error executing query: " . $conn->error . "</p>");
}

// Display users
if ($result->num_rows > 0) {
    echo "<h3 class='text-primary'>Registered Users</h3><hr>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='table-dark'><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }

    echo "</tbody></table></div>";
} else {
    echo "<p class='text-warning'>No users found.</p>";
}
?>
