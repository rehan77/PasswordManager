<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Sign Up Page</title>
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
        <h2>Sign Up</h2>
        <form id="register-form" action="php/registerUser.php" method="post">
            <input id="name" type="text" placeholder="Enter Username" name="name" autofocus required/><br>
            <div class="reg-error" id="name-error"></div>
            <input id="email" type="email" placeholder="Enter Email" name="email" required/><br>
            <div class="reg-error" id="email-error"></div>
            <input id="pass" type="password" placeholder="Enter Password" name="password-entry" required/><br>
            <div class="reg-error" id="pass-length-error"></div>
            <input id="repass" type="password" placeholder="Confirm Password" required/><br>
            <div class="reg-error" id="pass-error"></div>
            <input type="submit" value="Sign Up" id="register-btn"/>
        </form>
    </section>
    <footer>
        <p>2020 &copy; All Rights Reserved</p>
    </footer>
    <script src="js/validateUser.js"></script>
</body>
</html>