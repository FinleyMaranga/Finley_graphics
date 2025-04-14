<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: signup.php");
    exit();
}

include 'db.php'; // Include database connection

$user_email = $_SESSION['user'];

// Get the user ID from the email
$userQuery = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$userResult = $stmt->get_result();
$userData = $userResult->fetch_assoc();
$user_id = $userData['id'] ?? null;

// Fetch selected courses for the user
$selected_courses = [];
if ($user_id) {
    $query = "SELECT courses.id, courses.course_name
              FROM user_courses
              JOIN courses ON user_courses.course_id = courses.id
              WHERE user_courses.user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $selected_courses[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Finley Graphics Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
        }
        .sidebar img {
            width: 140px;
            height: auto;
            margin-bottom: 20px;
        }
        .sidebar button {
            width: 90%;
            margin: 10px 0;
            padding: 10px;
            border: none;
            background: #495057;
            color: white;
            text-align: center;
            border-radius: 5px;
            transition: 0.3s;
            cursor: pointer;
        }
        .sidebar button:hover, .sidebar button.active {
            background: #007bff;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            background: #f8f9fa;
        }
        #dashboardContent {
            min-height: 300px;
            border-radius: 5px;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .loading {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="company.png" alt="Finley Graphics Academy Logo">
        <button class="nav-btn" onclick="loadContent('profile.php', this)">Profile</button>
        <button class="nav-btn active" onclick="loadContent('dashboard.php', this)">Courses</button>
        <button class="nav-btn" onclick="loadContent('messages.php', this)">Messages</button>
        <button class="nav-btn" onclick="loadContent('notifications.php', this)">Notifications</button>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div id="dashboardContent">
            <h2>Welcome to Your Dashboard, <strong><?php echo $_SESSION['user']; ?></strong>!</h2>

            <h3>Your Selected Courses:</h3>
            <?php if (!empty($selected_courses)): ?>
                <ul>
                    <?php foreach ($selected_courses as $course): ?>
                        <li><?php echo htmlspecialchars($course['course_name']); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No courses selected yet.</p>
            <?php endif; ?>

            <h3>Select a Course:</h3>
            <form id="courseForm">
                <select id="courseSelect" class="form-select">
                    <option value="">-- Choose a Course --</option>
                    <?php
                    $courseQuery = "SELECT * FROM courses";
                    $result = mysqli_query($conn, $courseQuery);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['course_name']}</option>";
                    }
                    ?>
                </select>
                <button type="button" class="btn btn-primary mt-2" onclick="saveCourse()">Select Course</button>
            </form>
            <p id="courseMessage" class="mt-2"></p>
        </div>
    </div>

    <!-- JavaScript to Save Courses Dynamically -->
    <script>
        function saveCourse() {
            let courseId = document.getElementById("courseSelect").value;
            if (!courseId) {
                document.getElementById("courseMessage").innerHTML = "<span class='text-danger'>Please select a course.</span>";
                return;
            }

            fetch("save_course.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "course_id=" + courseId
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes("Success")) {
                    document.getElementById("courseMessage").innerHTML = "<span class='text-success'>" + data + "</span>";
                    setTimeout(() => location.reload(), 1500);
                } else {
                    document.getElementById("courseMessage").innerHTML = "<span class='text-danger'>" + data + "</span>";
                }
            })
            .catch(error => {
                console.error("Error:", error);
                document.getElementById("courseMessage").innerHTML = "<span class='text-danger'>Failed to select course.</span>";
            });
        }
        
        function loadContent(page, btn) {
            document.getElementById('dashboardContent').innerHTML = "<div class='loading'><strong>Loading...</strong></div>";

            document.querySelectorAll('.nav-btn').forEach(button => button.classList.remove('active'));
            btn.classList.add('active');

            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('dashboardContent').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error loading page:', error);
                    document.getElementById('dashboardContent').innerHTML = "<p class='text-danger'>Failed to load content.</p>";
                });
        }
    </script>

</body>
</html>
