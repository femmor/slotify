<?php

// Sanitize username
function sanitizeUsername($data) {
    $data = strip_tags($data); // Remove HTML tags
    $data = str_replace(' ', '', $data); // Remove spaces
    return $data;
}

// Sanitize password
function sanitizePassword($data) {
    $data = strip_tags($data); 
    return $data;
}

// Login logic
if (isset($_POST['loginButton'])) {
    // Login logic
    $username = sanitizeUsername($_POST['loginUsername']);
    $password = sanitizePassword($_POST['loginPassword']);
}

?>