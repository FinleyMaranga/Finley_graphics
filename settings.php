<?php
include "connect.php"; // Ensure database connection

session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    die("<p class='text-danger'>Access Denied</p>");
}

// Fetch existing settings
$query = "SELECT theme, notification_settings FROM admin_settings WHERE admin_id = 1";
$result = $conn->query($query);
$settings = $result->fetch_assoc();
?>

<div class="container mt-4">
    <h2>Settings</h2>
    <form id="settingsForm">
        <div class="mb-3">
            <label class="form-label">Theme</label>
            <select class="form-control" name="theme">
                <option value="light" <?= $settings['theme'] == 'light' ? 'selected' : '' ?>>Light</option>
                <option value="dark" <?= $settings['theme'] == 'dark' ? 'selected' : '' ?>>Dark</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Notifications</label>
            <select class="form-control" name="notification_settings">
                <option value="on" <?= $settings['notification_settings'] == 'on' ? 'selected' : '' ?>>On</option>
                <option value="off" <?= $settings['notification_settings'] == 'off' ? 'selected' : '' ?>>Off</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<script>
document.getElementById("settingsForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    
    fetch("update_settings.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => alert(data))
    .catch(error => alert("Error updating settings."));
});
</script>
