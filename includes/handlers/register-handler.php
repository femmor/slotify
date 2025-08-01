<?php

/**
 *
 * Sanitation Functions
 *
 */

// Sanitize username
// This function removes HTML tags and spaces from the input data
function sanitizeUsername($data)
{
    $data = strip_tags($data); // Remove HTML tags
    $data = str_replace(' ', '', $data); // Remove spaces

    return $data;
}

// Function to sanitize text input
// This function removes HTML tags, spaces and capitalizes the first letter from the input data
function sanitizeTextInput($data)
{
    $data = strip_tags($data); // Remove HTML tags
    $data = str_replace(' ', '', $data); // Remove spaces
    $data = ucfirst(strtolower($data)); // Capitalizing first letter

    return $data;
}

// Function to sanitize email input
function sanitizeEmail($data)
{
    $data = filter_var($data, FILTER_SANITIZE_EMAIL); // Sanitize email

    return $data;
}

// Function to sanitize password input
function sanitizePassword($data)
{
    $data = strip_tags($data); // Remove HTML tags

    return $data;
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

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword);

    // Check if registration was successful
    if ($wasSuccessful) {
        // Redirect to success page or show success message
        header("Location: index.php");
        exit();
    } else {
        // Handle registration failure (e.g., show error messages)
        $errorMessage = $wasSuccessful; // Assuming $wasSuccessful contains error messages
        echo "<div class='error'>$errorMessage</div>";
    }

}
