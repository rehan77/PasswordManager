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
        $username = $_POST['login-name']
        $password = $_POST['login-pass']
        
        //Function to check whether connection to MySQL DB is successful
        function checkConnection($conn){
            if ($conn) {
              return TRUE;
            }else{
              die("Connection failed: ". mysqli_connect_error());
              return FALSE;
            }
          }

    ?>
</body>
</html>