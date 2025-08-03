<?php

include 'includes/config.php';

include 'includes/classes/Account.php';

$account = new Account($con);

// Include the registration handler
include 'includes/handlers/register-handler.php';
include 'includes/handlers/login-handler.php';

function getInputValue($name)
{
    return isset($_POST[$name]) ? htmlspecialchars($_POST[$name]) : '';
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="styles/index.css">
        <title>Login or Create account</title>
    </head>

    <body>
        <div id="inputContainer">
            <!-- Login Form -->
            <form action="register.php" id="loginForm" method="POST">
                <h2>Login to your account</h2>
                <?php echo $account->getError('login'); ?>
                <div class="form-control">
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" type="text" name="loginUsername" placeholder="Enter Username" value="<?php echo getInputValue('loginUsername'); ?>" required>
                </div>
                <div class="form-control">
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" type="password" name="loginPassword" placeholder="Enter Password" value="<?php echo getInputValue('loginPassword'); ?>"
                        required>
                </div>

                <button type="submit" name="loginButton">Login</button>
            </form>

            <!-- Register -->
            <form action="register.php" id="registerForm" method="POST">
                <h2>Create a new account</h2>
                <div class="form-control">
                    <?php echo $account->getError('firstName'); ?>
                    <label for="firstName">First Name</label>
                    <input id="firstName" type="text" name="firstName" placeholder="Enter First Name"
                        value="<?php echo getInputValue('firstName'); ?>"
                        required>
                </div>
                <div class="form-control">
                    <?php echo $account->getError('lastName'); ?>
                    <label for="lastName">Last Name</label>
                    <input id="lastName" type="text" name="lastName" placeholder="Enter Last Name"
                        value="<?php echo getInputValue('lastName'); ?>"
                        required>
                </div>
                <div class="form-control">
                    <?php echo $account->getError('email'); ?>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="Enter Email"
                        value="<?php echo getInputValue('email'); ?>"
                        required>
                </div>
                <div class="form-control">
                    <?php echo $account->getError('confirmEmail'); ?>
                    <label for="confirmEmail">Confirm Email</label>
                    <input id="confirmEmail" type="email" name="confirmEmail" placeholder="Confirm Email"
                        value="<?php echo getInputValue('confirmEmail'); ?>"
                        required>
                </div>
                <div class="form-control">
                    <?php echo $account->getError('username'); ?>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="Enter Username"
                        value="<?php echo getInputValue('username'); ?>"
                        required>
                </div>
                <div class="form-control">
                    <?php echo $account->getError('password'); ?>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter Password"
                        value="<?php echo getInputValue('password'); ?>" required>
                </div>
                <div class="form-control">
                    <?php echo $account->getError('confirmPassword'); ?>
                    <label for="confirmPassword">Confirm Password</label>
                    <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Confirm Password"
                        value="<?php echo getInputValue('confirmPassword'); ?>"
                        required>
                </div>

                <button type="submit" name="registerButton">Register</button>
            </form>
        </div>
    </body>

</html>