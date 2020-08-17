<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      //Setting variables for MySQL DB connection
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db_name = "passwordmanager";
      //Connecting to MySQL DB
      $conn = mysqli_connect($servername, $username, $password, $db_name);
      //Getting Input field data from 'index.html'(login page) form
      $login_username = $_POST['login-name'];
      $login_password = $_POST['login-pass'];
      //Hashing the input password during registration
      $salt = 'averageSaltLayer';
      $hashed_pass = hash_pbkdf2('sha512', $login_password, $salt, 3);
      //Function to check whether connection to MySQL DB is successful
      function checkConnection($conn){
        if ($conn) {
          return TRUE;
        }else{
          die("Connection failed: ". mysqli_connect_error());
          return FALSE;
        }
      }
      //Function to check whether the entered credentials match in the DB
      function authenticateCreds($conn, $login_username, $hashed_pass){
        $result = "SELECT user_id FROM user_details WHERE user_name = '$login_username' AND user_password = '$hashed_pass'";
        $check_result = mysqli_query($conn, $result);
        if(mysqli_num_rows($check_result) == 1){
          // echo 'We are In!';
          return TRUE;
        }
        else{
          return FALSE;
        }
      }
      //Authenticating the user and redirecting them to user-sites.html
      if(authenticateCreds($conn, $login_username, $hashed_pass)){
        header('Location: ../user-sites.html');
      }else{
        echo 'Invalid Details';
        header('Refresh:2; url= ../index.html');
      }
      //Closing the MySQL DB connection
      mysqli_close($conn);

    ?>
</body>
</html>