<?php
include "db_connect.php"; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme = $_POST["theme"];
    $notification_settings = $_POST["notification_settings"];
    
    $query = "UPDATE admin_settings SET theme=?, notification_settings=? WHERE admin_id=1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $theme, $notification_settings);
    
    if ($stmt->execute()) {
        echo "Settings updated successfully!";
    } else {
        echo "Error updating settings.";
    }
}
?>
