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




// Login logic
if (isset($_POST['loginButton'])) {
    // Login logic
    
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Welcome to Slotify</title>
</head>
<body>
    <div id="inputContainer">
        <!-- Login Form -->
        <form action="register.php" id="loginForm" method="POST">
            <h2>Login to your account</h2>
            <div class="form-control">
                <label for="loginUsername">Username</label>
                <input id="loginUsername" type="text" name="loginUsername" placeholder="Enter Username" required>
            </div>
            <div class="form-control">
                <label for="loginPassword">Password</label>
                <input id="loginPassword" type="password" name="loginPassword" placeholder="Enter Password" required>
            </div>

            <button type="submit" name="loginButton">Login</button>
        </form>

        <!-- Register -->
        <form action="register.php" id="registerForm" method="POST">
            <h2>Create a new account</h2>
            <div class="form-control">
                <label for="firstName">First Name</label>
                <input id="firstName" type="text" name="firstName" placeholder="Enter First Name" required>
            </div>
            <div class="form-control">
                <label for="lastName">Last Name</label>
                <input id="lastName" type="text" name="lastName" placeholder="Enter Last Name" required>
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="form-control">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" placeholder="Enter Username" required>
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="form-control">
                <label for="confirmPassword">Confirm Password</label>
                <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Confirm Password" required>
            </div>

            <button type="submit" name="registerButton">Register</button>
        </form>
    </div>
</body>
</html>