<?php
session_start();

// Admin credentials (in real applications, you'd store this securely in a database)
$admin_email = "marangafinley@gmail.com";
$admin_password = "38789092"; // This should be hashed in real apps (using password_hash)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $email = filter_var(trim($_POST["admin_email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["admin_password"]);

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error_message"] = "Invalid email format!";
        header("Location: index.php"); // Redirect to the login page with error
        exit();
    }

    // Check if the email and password match
    if ($email === $admin_email && $password === $admin_password) {
        // Set a session to indicate the admin is logged in
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_email"] = $email; // Store the admin's email in session
        header("Location: admin_dashboard.php"); // Redirect to the admin dashboard
        exit();
    } else {
        // Invalid credentials, redirect to the login page with an error message
        $_SESSION["error_message"] = "Invalid email or password!";
        header("Location: index.php"); // Redirect to the login page with error
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Finley Graphics Academy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Admin Login</h3>

                <?php
                // Display error message if exists
                if (isset($_SESSION["error_message"])) {
                    echo '<div class="alert alert-danger">' . $_SESSION["error_message"] . '</div>';
                    unset($_SESSION["error_message"]); // Clear the error message after displaying
                }
                ?>

                <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label for="admin_email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="admin_email" name="admin_email" required>
                    </div>

                    <div class="mb-3">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
