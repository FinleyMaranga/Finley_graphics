<?php
session_start();
include 'db.php'; 

if (!isset($_SESSION['user'])) {
    header("Location: signup.php");
    exit();
}

// Fetch user details from the database based on session user
$user = $_SESSION['user']; // Assuming the 'firstname' is stored in session after login
$query = "SELECT * FROM users WHERE firstname='$user'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $userDetails = mysqli_fetch_assoc($result);
} else {
    echo "<p class='text-danger'>User details not found.</p>";
    exit();
}
?>

<div class="user-profile">
    <div class="profile-header">
        <div class="profile-icon">
            <!-- Display a user icon (you can replace this with an image if preferred) -->
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm0 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1zM8 4a3 3 0 1 0 0 6A3 3 0 0 0 8 4zm0 7a5 5 0 0 0-4 2h8a5 5 0 0 0-4-2z"/>
            </svg>
        </div>
        <h3 class="profile-title">User Profile</h3>
    </div>
    <div class="profile-details">
        <p><strong>First Name:</strong> <?php echo $userDetails['firstname']; ?></p>
        <p><strong>Last Name:</strong> <?php echo $userDetails['lastname']; ?></p>
        <p><strong>Email:</strong> <?php echo $userDetails['email']; ?></p>
    </div>
</div>

<style>
    .user-profile {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: #343a40;
    }
    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .profile-icon {
        margin-right: 20px;
    }
    .profile-title {
        font-size: 24px;
        font-weight: 600;
        color: #007bff; /* Matching your theme color */
    }
    .profile-details p {
        font-size: 18px;
        color: #495057;
    }
    .profile-details strong {
        color: #007bff;
    }
</style>
