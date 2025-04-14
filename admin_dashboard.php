<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: index.php");
    exit();
}

// Admin details
$admin_name = "Maranga Finley";
$admin_email = "marangafinley@gmail.com";
$admin_profile_picture = "admin.jpg";
$admin_logo = "company.png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Finley Graphics Academy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f4f7fc;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            text-align: center;
        }
        .sidebar img {
            width: 100px;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            font-size: 16px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #007bff;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .profile-card {
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid white;
        }
        .profile-info {
            font-size: 18px;
        }
        .profile-info i {
            margin-right: 8px;
        }
        .btn-logout {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="<?= $admin_logo ?>" alt="Finley Graphics Academy Logo">
        <h4 class="text-white">Admin Dashboard</h4>
        <a href="#" id="profile" class="nav-btn">Profile</a>
        <a href="#" id="courses" class="nav-btn">Courses</a>
        <a href="#" id="users" class="nav-btn">Users</a>
        <a href="#" id="messages" class="nav-btn">Messages</a>
        <a href="#" id="settings" class="nav-btn">Settings</a>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div id="dashboardContent">
            <!-- Profile Section -->
            <div class="profile-card" id="profileSection">
                <img src="<?= $admin_profile_picture ?>" alt="Admin Profile Picture" id="adminImage">
                <h3 id="adminName"><i class="bi bi-person-circle"></i> <?= $admin_name ?></h3>
                <p class="profile-info"><i class="bi bi-envelope"></i> <?= $admin_email ?></p>
            </div>
        </div>
    </div>

    <!-- JavaScript to Load Profile Details -->
    <script>
        function loadProfile() {
            // Fetching admin details from PHP variables embedded in JavaScript
            const adminDetails = {
                name: "<?= $admin_name ?>",
                email: "<?= $admin_email ?>",
                profile_picture: "<?= $admin_profile_picture ?>"
            };

            // Updating the dashboard content with admin details in blue theme
            document.getElementById("dashboardContent").innerHTML = `
                <div class="profile-card">
                    <img src="${adminDetails.profile_picture}" alt="Admin Profile Picture">
                    <h3><i class="bi bi-person-circle"></i> ${adminDetails.name}</h3>
                    <p class="profile-info"><i class="bi bi-envelope"></i> ${adminDetails.email}</p>
                </div>
            `;
        }

        function loadContent(page, btn) {
            // Reset dashboardContent and show loading message
            document.getElementById("dashboardContent").innerHTML = "<div class='text-center'><strong>Loading...</strong></div>";

            // Remove active class from all buttons
            document.querySelectorAll('.nav-btn').forEach(button => button.classList.remove('active'));

            // Add active class to the clicked button
            btn.classList.add('active');

            if (page === 'profile') {
                loadProfile();  // Call function to display profile data
            } else {
                fetch(page + ".php")
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("dashboardContent").innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error loading content:', error);
                        document.getElementById("dashboardContent").innerHTML = "<p class='text-danger'>Failed to load content.</p>";
                    });
            }
        }

        // Event Listeners for Sidebar Buttons
        document.getElementById("messages").addEventListener("click", function() {
            loadContent('messages', this);
        });

        document.getElementById("profile").addEventListener("click", function() {
            loadContent('profile', this);
        });

        document.getElementById("courses").addEventListener("click", function() {
            loadContent('view_courses', this);
        });

        document.getElementById("users").addEventListener("click", function() {
            loadContent('users', this);
        });

        document.getElementById("settings").addEventListener("click", function() {
            loadContent('settings', this);
        });

        // Load Profile as Default View
        loadProfile();
    </script>

</body>
</html>
