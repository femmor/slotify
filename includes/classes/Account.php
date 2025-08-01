<?php

class Account
{
    private $errorArray;

    public function __construct()
    {
        $this->errorArray = [];
    }

    /**
     * Function to register a new user
     * @param string $username
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $confirmEmail
     * @param string $password
     * @param string $confirmPassword
     * @return string
     */

    public function register($username, $firstName, $lastName, $email, $confirmEmail, $password, $confirmPassword)
    {
        // Validate inputs
        $this->validateUsername($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmail($email, $confirmEmail);
        $this->validatePassword($password, $confirmPassword);

        // Check for errors
        if (empty($this->errorArray)) {
            // Save user to database
            return true;
        } else {
            return implode(", ", $this->errorArray); // Return error messages
        }
    }

    /**
     * Function to validate if the username is valid
     * @param string $username
     * @return bool
     */
    private function validateUsername($username)
    {
        if (empty($username) || strlen($username) < 5 || strlen($username) > 25) {
            $this->errorArray[] = "Username can not be empty and must be between 5 and 25 characters.";

            return false; // Invalid username
        }

        //TODO: Check if username already exists in the database
        return true; // Valid username
    }

    /**
     * Function to validate if the first name is valid
     * @param string $firstName
     * @return bool
     */
    private function validateFirstName($firstName)
    {
        if (empty($firstName) || strlen($firstName) < 2 || strlen($firstName) > 25) {
            $this->errorArray[] = "First name can not be empty and must be between 2 and 25 characters.";

            return false; // Invalid first name
        }

        return true; // Valid first name
    }

    /**
     * Function to validate if the last name is valid
     * @param string $lastName
     * @return bool
     */
    private function validateLastName($lastName)
    {
        if (empty($lastName) || strlen($lastName) < 2 || strlen($lastName) > 25) {
            $this->errorArray[] = "Last name can not be empty and must be between 2 and 25 characters.";

            return false; // Invalid last name
        }

        return true; // Valid last name
    }

    /**
     * Function to validate if the email is valid
     * @param string $email
     * @param string $confirmEmail
     * @return bool
     */
    private function validateEmail($email, $confirmEmail)
    {
        if (empty($email) || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorArray[] = "Email can not be empty and must be a valid email address.";

            return false; // Invalid email
        }

        if (empty($confirmEmail) || ! filter_var($confirmEmail, FILTER_VALIDATE_EMAIL)) {
            $this->errorArray[] = "Confirm email can not be empty and must be a valid email address.";

            return false; // Invalid confirm email
        }

        if ($email !== $confirmEmail) {
            $this->errorArray[] = "Email and confirm email do not match.";

            return false; // Emails do not match
        }

        //TODO: Check if email already exists in the database
        return true; // Valid email
    }

    /**
     * Function to validate if the password is strong
     * @param string $password
     * @param string $confirmPassword
     * @return bool
     */
    private function validatePassword($password, $confirmPassword)
    {
        if ($password !== $confirmPassword) {
            $this->errorArray[] = "Passwords do not match.";

            return false; // Passwords do not match
        }

        if (empty($password) || strlen($password) < 6 || strlen($password) > 30) {
            $this->errorArray[] = "Password can not be empty and must be between 6 and 30 characters long.";

            return false; // Invalid password
        }

        if (preg_match('/[^a-zA-Z0-9]/', $password)) {
            $this->errorArray[] = "Password can only contain letters and numbers.";

            return false; // Invalid password
        }

        return true; // Valid password
    }
}
