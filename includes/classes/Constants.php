<?php

// This class contains constants for error messages used in the application
// It provides a centralized way to manage error messages for user input validation
class Constants
{
    public static $userNameError = "Username can not be empty and must be between 5 and 25 characters.";
    public static $firstNameError = "First name can not be empty and must be between 2 and 25 characters.";
    public static $lastNameError = "Last name can not be empty and must be between 2 and 25 characters.";
    public static $emailError = "Email can not be empty and must be a valid email address.";
    public static $confirmEmailError = "Confirm email can not be empty and must be a valid email address.";
    public static $emailsDoNotMatchError = "Email and confirm email do not match.";
    public static $passwordsDoNotMatchError = "Passwords do not match.";
    public static $passwordError = "Password can not be empty and must be between 6 and 30 characters.";
    public static $confirmPasswordError = "Confirm password can not be empty and must be between 6 and 30 characters.";
    public static $passwordStrengthError = "Password can only contain letters and numbers.";
    public static $usernameExistsError = "This username already exists.";
    public static $emailExistsError = "This email address is already registered.";
}
