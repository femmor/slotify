<?php

// Start output buffering
// This allows us to capture output and send it later
ob_start();

// Sets the default timezone
$timezone = date_default_timezone_set("America/Chicago"); // Set the default timezone

// Database connection
// This connects to the MySQL database using mysqli
$con = mysqli_connect("localhost", "root", "root", "slotify");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL Database: " . mysqli_connect_error();
    exit();
}
