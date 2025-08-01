<?php

// Sanitize username
// This function removes HTML tags and spaces from the input data
function sanitizeUsername($data) {
    $data = strip_tags($data); // Remove HTML tags
    $data = str_replace(' ', '', $data); // Remove spaces
    return $data;
}

// Function to sanitize text input
// This function removes HTML tags, spaces and capitalizes the first letter from the input data
function sanitizeTextInput($data) {
    $data = strip_tags($data); // Remove HTML tags
    $data = str_replace(' ', '', $data); // Remove spaces
    $data = ucfirst(strtolower($data)); // Capitalizing first letter
    return $data;
}

// Function to sanitize email input
function sanitizeEmail($data) {
    $data = filter_var($data, FILTER_SANITIZE_EMAIL); // Sanitize email
    return $data;
}

// Function to sanitize password input
function sanitizePassword($data) {
    $data = strip_tags($data); // Remove HTML tags
    return $data;
}

// Register logic
if (isset($_POST['registerButton'])) {
    $username = sanitizeUsername($_POST['username']);
    $firstName = sanitizeTextInput($_POST['firstName']);
    $lastName = sanitizeTextInput($_POST['lastName']);
    $email = sanitizeEmail($_POST['email']);
    $password = sanitizePassword($_POST['password']);
    $confirmPassword = sanitizePassword($_POST['confirmPassword']);

    echo "Username: $username<br>";
    echo "First Name: $firstName<br>";
    echo "Last Name: $lastName<br>";
    echo "Email: $email<br>";
    echo "Password: $password<br>";
    echo "Confirm Password: $confirmPassword<br>";
}

?>