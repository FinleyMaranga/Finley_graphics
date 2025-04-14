<?php
session_start();
include 'db.php'; // Database connection

if (!isset($_SESSION['user'])) {
    echo "Error: User not logged in.";
    exit();
}

$user_email = $_SESSION['user']; // Get user email

// Debugging: Print email
echo "Debug: Logged-in user email: $user_email <br>";

// Get user ID
$userQuery = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$userResult = $stmt->get_result();
$userData = $userResult->fetch_assoc();
$user_id = $userData['id'] ?? null;

// Debugging: Check if user ID exists
if (!$user_id) {
    echo "Error: User not found in database.";
    exit();
} else {
    echo "Debug: User ID: $user_id <br>";
}

// Get selected course ID
if (isset($_POST['course_id'])) {
    $course_id = intval($_POST['course_id']);

    // Debugging: Print selected course ID
    echo "Debug: Selected Course ID: $course_id <br>";

    // Check if the course exists
    $courseQuery = "SELECT id FROM courses WHERE id = ?";
    $stmt = $conn->prepare($courseQuery);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $courseResult = $stmt->get_result();

    if ($courseResult->num_rows == 0) {
        echo "Error: Selected course does not exist.";
        exit();
    }

    // Check if course is already selected
    $checkQuery = "SELECT * FROM user_courses WHERE user_id = ? AND course_id = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ii", $user_id, $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Error: Course already selected.";
        exit();
    }

    // Insert the selected course
    $insertQuery = "INSERT INTO user_courses (user_id, course_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ii", $user_id, $course_id);

    if ($stmt->execute()) {
        echo "Success: Course selected successfully.";
    } else {
        echo "Error: Could not save course. " . $stmt->error;
    }
} else {
    echo "Error: No course selected.";
}
?>
