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
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        </form>
    </div>
</body>
</html>