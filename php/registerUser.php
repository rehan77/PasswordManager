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
    $db_username = "root";
    $db_password = "";
    $db_name = "passwordmanager";
    //Connecting to MySQL DB
    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);
    //Getting Input field data from 'register.html' form
    $username = $_POST["name"];
    $useremail = $_POST["email"];
    $userpassword = $_POST["password-entry"];
    //Hashing the input password during registration
    $salt = 'averageSaltLayer';
    $hashed_pass = hash_pbkdf2('sha512', $userpassword, $salt, 10000);
    
    //Function to check whether connection to MySQL DB is successful
    function checkConnection($conn){
      if ($conn) {
        return TRUE;
      }else{
        die("Connection failed: ". mysqli_connect_error());
        return FALSE;
      }
    }

    //Function for checking whether a user by the same email ID exists in DB
    function checkExistingUser($conn, $useremail){
      $check_existing = "SELECT user_id FROM user_details WHERE user_email = '$useremail'";
      $check_existing_result = mysqli_query($conn, $check_existing);
      if(mysqli_num_rows($check_existing_result) != 0){
        return TRUE;
      } else{
        return FALSE;
        // header('Refresh: 1000, url = ../html/sitelist.php');
      }
    }

    //Function for adding a new user to the DB
    function addNewUser($conn, $username, $hashed_pass, $useremail){
        $insert_new_user = "INSERT INTO user_details (user_name, user_password, user_email)
          VALUES ('$username', '$hashed_pass', '$useremail')";
        if (mysqli_query($conn, $insert_new_user)) {
          //Redirecting to the login page
          header('Location: ../index.php');
        } else {
          echo "Error: " . $insert_new_user . "<br>" . mysqli_error($conn);
        }
    }

    //Adding a new user after checking that they are new
    if(!checkExistingUser($conn, $useremail)){
      addNewUser($conn, $username, $hashed_pass, $useremail);
    }
    else{
      echo "User already exists!<br>";
    }
    //Closing the MySQL DB connection
    mysqli_close($conn);

  ?> 
</body>
</html>