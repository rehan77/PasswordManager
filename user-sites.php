<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Your Sites</title>
    <style>
        .middle{
            z-index: 1;
            display: none;
            text-align: center;
            padding: 10px;
            border: 1px solid black;
            min-width: 50%;
            margin: 0 auto;
            background: #f1f1f1;
            border-radius: 5px;
            top: 0;
        }
        .middle form textarea{
            padding: 10px;
            margin: 5px 0; /* should be like this to be aligned properly */
            width: 50%;
            border: 1px gray solid;
            border-radius: 5px;
            resize: none;
        }
        .middle form textarea:focus{
            border: 2px solid blue;
        }
        #close h2{
            font-size: 24px;
        }
        #close span{
            font-size: 24px;
        }
        #close span:hover{
            cursor: pointer;
            font-size: 26px;
            font-weight: bolder;
        }

        @media screen and (min-width: 768px){
            .middle{
                width: 60%;
            }
        }
        </style>
                        
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li><a href="php/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        <section class="top">
            <h1>Sites</h1>
            <button type="button" id="add-site">+</button><br>
        </section>
        <section>
            <div class="middle">
                <div id="close">
                    <h2>Enter Site Details</h2><span id="span">&times;</span>
                </div>
                <form action="php/addSite.php" method="POST">
                    <input type="text" id="site-name" name="sitename" placeholder="Site Name" required/><br>
                    <input type="url" id="site-url" name="siteurl" placeholder="Site URL" required/><br>
                    <input type="text" id="site-user" name="siteuser" placeholder="Site Username" required/><br>
                    <input type="password" id="site-pass" name="sitepass" placeholder="Site Password" required/><br>
                    <textarea cols="40" rows="5" name="sitenotes" placeholder="Your notes go here..."></textarea><br>
                    <input type="submit" id="site-submit" name="sitesubmit" value="Add Site"/><br>
                </form>
            </div>
        </section>
        <section class ="bottom">
            <div class="site-element">
                <div class="replace">
                    <h3>You have not added a site yet</h3>
                    <h5>Add a site to populate this area</h5>
                </div>
            </div>
        </section>
        <!-- <footer>
            <p>2020 &copy; All Rights Reserved</p>
        </footer> -->
    </div>
    <script src="js/addNewSite.js"></script>
    <script src="js/printSiteData.js"></script>
</body>
</html>