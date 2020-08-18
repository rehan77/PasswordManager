<?php
    session_start();
    //Setting variables for MySQL DB connection
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "passwordmanager";
    //Connecting to MySQL DB
    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);
    //Getting Input field data from 'register.html' form
    if(isset($_POST['sitesubmit'])){
      $sitename = $_POST["sitename"];
      $siteurl = $_POST["siteurl"];
      $siteuser = $_POST["siteuser"];
      $sitepass = $_POST["sitepass"];
      $sitenotes = $_POST["sitenotes"];
    }

    $username = $_SESSION['login-name'];
    $password = $_SESSION['hashed-pass'];
    //Function to check whether connection to MySQL DB is successful
    function checkConnection($conn){
      if ($conn) {
        return TRUE;
      }else{
        die("Connection failed: ". mysqli_connect_error());
        return FALSE;
      }
    }
    
    function addSiteDetails($conn, $sitename, $siteurl, $siteuser, $sitepass, $sitenotes, $username, $password){
      $sql = "SELECT user_id FROM user_details WHERE user_name = '$username' AND user_password = '$password'";
      $sql_query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($sql_query);
      $user_id = (int) $row['user_id'];
      if(mysqli_num_rows($sql_query) == 1){
        $add_site_query = "INSERT INTO site_details(site_name, site_url, site_username, site_password, site_notes, user_id)VALUES('$sitename', '$siteurl', '$siteuser', '$sitepass', '$sitenotes', '$user_id')";
        if(mysqli_query($conn, $add_site_query)){
          return TRUE;
        } else{
          echo "Error: " . $add_site_query . "<br>" . mysqli_error($conn);
          return FALSE;
        }
      }
      else{
        return FALSE;
      }
    }

    if(addSiteDetails($conn, $sitename, $siteurl, $siteuser, $sitepass, $sitenotes, $username, $password)){
      header('Refresh:0; url=../user-sites.php');
      echo 'Site Added';
    }
    else{
      echo 'An ERROR Occured: Contact Site Developer';
    }
