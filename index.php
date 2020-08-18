<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
        </nav>
    </header>
    <section class="forms">
        <h2>Login</h2>
        <form id="login-form" action="php/authenticateUser.php" method="POST">
            <input id="username" type="text" placeholder="Username" name="login-name" autofocus required/><br>
            <div class="reg-error" id="name-error"></div>
            <input id="password" type="password" placeholder="Password" name="login-pass" required/><br>
            <div class="reg-error" id="pass-length-error"></div>
            <input type="submit" value="Login" name="submit" id="login-btn"/>
        </form>
        <div id="login-extra">
            <a href="forgot.html">Forgot password?</a>
            <hr>
            <p>Don't have an account? <a href="register.html">Sign Up</a></p>
        </div>
    </section>
    <footer>
        <p>2020 &copy; All Rights Reserved</p>
    </footer>
    <script src="js/validateCreds.js"></script>
    <!-- <script src="js/displayLoginError.js"></script> -->
</body>
</html>