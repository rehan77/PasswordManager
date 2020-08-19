<?php
    session_start();

    //Setting variables for MySQL DB connection
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "passwordmanager";
    //Connecting to MySQL DB
    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

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

    function getSiteData($conn, $username, $password){
      $sql = "SELECT user_id FROM user_details WHERE user_name = '$username' AND user_password = '$password'";
      $sql_query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($sql_query);
      $user_id = (int) $row['user_id'];
      if(mysqli_num_rows($sql_query) == 1){
        $get_site_query = "SELECT site_name, site_url, site_username, site_password, site_notes FROM site_details WHERE user_id = '$user_id'";

        if(mysqli_query($conn, $get_site_query)){
          $sql_query2 = mysqli_query($conn, $get_site_query);
          $array1 = array();
          $count = 'site1';
          while($site_data = mysqli_fetch_assoc($sql_query2)){
            $result = json_encode($site_data);
            $array1[$count] = $result;
            $count++;
          }
          $JSONarray = json_encode($array1);
          return $JSONarray;
        }else{
          echo $get_site_query.mysqli_error($conn);
        }
      }
    }

    $json_object = getSiteData($conn, $username, $password);
    echo $json_object;
    header('Refresh:0;url=../user-sites.php');
?>