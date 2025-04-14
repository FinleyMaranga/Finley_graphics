<?php
// logout.php

session_start();
session_destroy(); // Destroy the session to log the admin out
header("Location: index.html"); // Redirect to the login page after logging out
exit();
?>
