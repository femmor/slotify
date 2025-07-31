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

            <button type="submit">Login</button>
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

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>