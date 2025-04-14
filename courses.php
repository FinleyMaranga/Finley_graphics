<?php
session_start();
include 'db.php'; // Include your database connection

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_SESSION['user']; // Get the logged-in user's email
    $selected_courses = $_POST['courses']; // Array of selected course IDs

    // Get the user_id from the users table based on the email
    $query = "SELECT id FROM users WHERE email = '$user_email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $user_id = $user['id'];

    // Insert the selected courses into user_courses table
    foreach ($selected_courses as $course_id) {
        $insert_query = "INSERT INTO user_courses (user_id, course_id) VALUES ('$user_id', '$course_id')";
        if (!mysqli_query($conn, $insert_query)) {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Display success message
    echo "<script>alert('Courses selected successfully!'); window.location.href='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Select Courses</h2>
    <form method="POST">
        <?php
        // Fetch available courses from the database
        $courses_query = "SELECT * FROM courses";
        $courses_result = mysqli_query($conn, $courses_query);

        if (mysqli_num_rows($courses_result) > 0) {
            while ($course = mysqli_fetch_assoc($courses_result)) {
                echo "<div class='form-check'>
                        <input class='form-check-input' type='checkbox' name='courses[]' value='" . $course['id'] . "' id='course" . $course['id'] . "'>
                        <label class='form-check-label' for='course" . $course['id'] . "'>" . $course['course_name'] . "</label>
                    </div>";
            }
        } else {
            echo "<p>No courses available.</p>";
        }
        ?>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

</body>
</html>
