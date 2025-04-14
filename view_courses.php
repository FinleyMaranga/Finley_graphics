<?php
session_start();
include 'db.php'; // Ensure database connection

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    echo "<p class='text-danger'>Access denied. Please log in as an admin.</p>";
    exit();
}

// Fetch all courses from the database
$query = "SELECT id, course_name FROM courses ORDER BY id ASC";
$result = $conn->query($query);

// Debugging: Check if the query failed
if (!$result) {
    echo "<p class='text-danger'>Error executing query: " . $conn->error . "</p>";
    exit();
}

// Check if there are courses in the table
if ($result->num_rows > 0) {
    echo "<h3 class='text-primary'>Available Courses</h3><hr>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='table-dark'><tr><th>ID</th><th>Course Name</th></tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['course_name']}</td>
              </tr>";
    }

    echo "</tbody></table></div>";
} else {
    echo "<p class='text-warning'>No courses found.</p>";
}
?>
