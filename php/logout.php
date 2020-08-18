<?php
    session_start();
    echo 'Logging Out. Please wait...';
    session_unset();
    session_destroy();
    header('Refresh:1; url=../index.php');
?>