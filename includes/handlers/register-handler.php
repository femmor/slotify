<?php

/**
 * 
 * Sanitation Functions
 * 
 */

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


/**
 * 
 * Validation Functions
 * 
 */

// Function to validate if the username is valid
function validateUsername($username) {
    if (empty($username) || strlen($username) < 3 || strlen($username) > 25) {
        return false; // Invalid username
    }
    return true; // Valid username
}

// Function to validate if the first name is valid
function validateFirstName($firstName) {
    if (empty($firstName) || strlen($firstName) < 2 || strlen($firstName) > 25) {
        return false; // Invalid first name
    }
    return true; // Valid first name
}

// Function to validate if the last name is valid
function validateLastName($lastName) {
    if (empty($lastName) || strlen($lastName) < 2 || strlen($lastName) > 25) {
        return false; // Invalid last name
    }
    return true; // Valid last name
}

// Function to validate if the email is valid
function validateEmail($email, $confirmEmail) {
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false; // Invalid email
    }

    if (empty($confirmEmail) || !filter_var($confirmEmail, FILTER_VALIDATE_EMAIL)) {
        return false; // Invalid confirm email
    }

    if ($email !== $confirmEmail) {
        return false; // Emails do not match
    }
    
    return true; // Valid email
}

// Function to validate if the password is strong
function validatePassword($password, $confirmPassword) {
    if (empty($password) || strlen($password) < 6) {
        return false; // Invalid password
    }

    if (empty($confirmPassword) || strlen($confirmPassword) < 6) {
        return false; // Invalid confirm password
    }

    if ($password !== $confirmPassword) {
        return false; // Passwords do not match
    }
    return true; // Valid password
}



/**
 * 
 * Registration Logic
 * 
 */
if (isset($_POST['registerButton'])) {
    $username = sanitizeUsername($_POST['username']);
    $firstName = sanitizeTextInput($_POST['firstName']);
    $lastName = sanitizeTextInput($_POST['lastName']);
    $email = sanitizeEmail($_POST['email']);
    $confirmEmail = sanitizeEmail($_POST['confirmEmail']);
    $password = sanitizePassword($_POST['password']);
    $confirmPassword = sanitizePassword($_POST['confirmPassword']);

    // Validate inputs
    validateUsername($username);
    validateFirstName($firstName);
    validateLastName($lastName);
    validateEmail($email, $confirmEmail);
    validatePassword($password, $confirmPassword);  
}

?>