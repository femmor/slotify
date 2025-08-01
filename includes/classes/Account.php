<?php

include_once("Constants.php");

// Account class handles user registration and validation
class Account
{
    private $errorArray;
    private $con;

    public function __construct($con)
    {
        $this->errorArray = [];
        $this->con = $con;
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

    // This function handles the registration logic
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
            $this->insertUserDetails($username, $firstName, $lastName, $email, $password);

            return true; // Return true if registration is successful
        } else {
            return false; // Return false if there are errors
        }
    }

    private function insertUserDetails($username, $firstName, $lastName, $email, $password)
    {
        // Encrypt the password
        $encryptedPassword = md5($password);
        $profilePic = "assets/images/profile-pics/default.jpg"; // Default profile picture
        $date = date("Y-m-d"); // Current date

        // Alternative way to hash the password
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($this->con, "INSERT INTO users (username, firstName, lastName, email, password, signUpDate, profilePic) VALUES ('$username', '$firstName', '$lastName', '$email', '$encryptedPassword', '$date', '$profilePic')");

        if (! $result) {
            echo "Error: " . mysqli_error($this->con); // Debugging error

            return false; // Return false if there is an error inserting user details
        }

        return $result; // Return the result of the query
    }

    public function getError($error)
    {
        if (! isset($this->errorArray[$error]) || empty($this->errorArray[$error])) {
            return ""; // No error found
        }

        return "<span class='errorMessage'>" . $this->errorArray[$error] . "</span>";
    }

    /**
     * Function to validate if the username is valid
     * @param string $username
     * @return bool
     */
    private function validateUsername($username)
    {
        if (empty($username) || strlen($username) < 5 || strlen($username) > 25) {
            $this->errorArray['username'] = Constants::$userNameError;

            return false; // Invalid username
        }

        // Check if username already exists in the database
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
        if (mysqli_num_rows($checkUsernameQuery) != 0) {
            $this->errorArray['username'] = Constants::$userNameTakenError;

            return false; // Username already exists
        }

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
            $this->errorArray['firstName'] = Constants::$firstNameError;

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
            $this->errorArray['lastName'] = Constants::$lastNameError;

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
            $this->errorArray['email'] = Constants::$emailError;

            return false; // Invalid email
        }

        if (empty($confirmEmail) || ! filter_var($confirmEmail, FILTER_VALIDATE_EMAIL)) {
            $this->errorArray['confirmEmail'] = Constants::$confirmEmailError;

            return false; // Invalid confirm email
        }

        if ($email !== $confirmEmail) {
            $this->errorArray['confirmEmail'] = Constants::$emailsDoNotMatchError;

            return false; // Emails do not match
        }

        //TODO: Check if email already exists in the database
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
        if (mysqli_num_rows($checkEmailQuery) != 0) {
            $this->errorArray['email'] = Constants::$emailExistsError;

            return false; // Email already exists
        }

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
        if (empty($password) || strlen($password) < 6 || strlen($password) > 30) {
            $this->errorArray['password'] = Constants::$passwordError;

            return false; // Invalid password
        }

        if (empty($confirmPassword) || strlen($confirmPassword) < 6 || strlen($confirmPassword) > 30) {
            $this->errorArray['confirmPassword'] = Constants::$confirmPasswordError;

            return false; // Invalid confirm password
        }

        if ($password !== $confirmPassword) {
            $this->errorArray['confirmPassword'] = Constants::$passwordsDoNotMatchError;

            return false; // Passwords do not match
        }

        if (preg_match('/[^a-zA-Z0-9]/', $password)) {
            $this->errorArray['password'] = Constants::$passwordStrengthError;

            return false; // Invalid password
        }

        return true; // Valid password
    }
}
