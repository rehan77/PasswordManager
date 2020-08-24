<?php
    session_start();
    //Setting variables for MySQL DB connection
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "passwordmanager";
    //Connecting to MySQL DB
    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

    function checkConnection($conn){
        if ($conn){
          return TRUE;
        }else{
          die("Connection failed: ". mysqli_connect_error());
          return FALSE;
        }
      }

      if(isset($_POST["del-btn"])){
        var_dump($_POST);
        $siteuser = $_POST["siteuser"];
        $sitepass = $_POST["sitepass"];
    }
    else{
        echo 'POST Error';
    }
    $username = $_SESSION['login-name'];
    $password = $_SESSION['hashed-pass'];
    

    function deleteSite($conn, $username, $password, $siteuser, $sitepass){
        $query = "SELECT user_id FROM user_details WHERE user_name = '$username' AND user_password = '$password'";
        $query_result = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_result) == 1){
            $user_id_row = mysqli_fetch_assoc($query_result);
            $user_id = (int) $user_id_row['user_id'];
            $delete_query = "DELETE FROM site_details WHERE user_id = '$user_id' AND site_username = '$siteuser' AND site_password = '$sitepass'";
            if($delete_query_result = mysqli_query($conn, $delete_query)){
                echo 'DELETED SUCCESSFULLY';
                header("Refresh:0;url=../user-sites.php");
            }
            else{
                echo $delete_query_result.mysqli_error();
            }
        }
        else{
            echo 'User Not Found';
        }
    }

    deleteSite($conn, $username, $password, $siteuser, $sitepass);
?>