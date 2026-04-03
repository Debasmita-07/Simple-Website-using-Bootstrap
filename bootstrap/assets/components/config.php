<?php
// config.php

// Database credentials
$host = "localhost";        // Usually 'localhost'
$db_name = "Admin_Register"; // Replace with your database name
$db_user = "root"; // Replace with your DB username
$db_pass = ""; // Replace with your DB password

// Create connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: set charset to avoid encoding issues
$conn->set_charset("utf8mb4");
?>
