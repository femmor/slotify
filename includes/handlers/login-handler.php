<?php

/**
 *
 * Registration Logic
 *
 */
if (isset($_POST['loginButton'])) {
    $username = sanitizeUsername($_POST['loginUsername']);
    $password = sanitizePassword($_POST['loginPassword']);

    $result = $account->login($username, $password);

    // Check if login was successful
    if ($result) {
        // Redirect to index page or show success message
        header("Location: index.php");
        exit();
    }
    // If login fails, errors will be displayed on the login form
}
