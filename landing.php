<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Zuri Assignment 2 webpage</title>
    <style>
    body{
        margin: 20%;
        margin-top: 3%;
    }
    .header{
        padding:2px;
        text-align: center;
    }
    .form{
        border: 1px solid #FB6600;
        padding:2px;
        font-size:20px;
        text-align:center;
        margin: auto;
        width:25%;
    }
    
</style>
</head>
<body>
    <!-- landing page of my site -->
    <div class="body">
        <div class="header">
            <h1> WELCOME TO MY WEBPAGE <h1>
            <h2> To view information about me, you have to provide credentials <h2>
        </div>

        <!-- form area -->
        <div class="form">
            <form method="POST">                                    
                <input type="text" id="fname" name="fname" placeholder="FIRST NAME"><br><br>
                <input type="text" id="lname" name="lname" placeholder="LAST NAME"><br><br>
                <input type="password" id="pword" name="pword" placeholder="PASSWORD"><br><br>
                <input type="submit" name="submit" value="submit">               
            </form>
        </div>

        <?php

                if(isset($_POST['submit'])){

                $firstname=trim(strtolower($_POST['fname']));
                $lastname=trim(strtolower($_POST['lname']));
                $password=$_POST['pword'];
                $message='';


                if(empty($firstname)) 
                {
                  $message .= "<li>Please enter first name</li>";
                }
                if(empty($lastname)) 
                {
                  $message .= "<li>Please enter last name</li>";
                }
                if(empty($password)) 
                {
                  $message .= "<li>Please enter password</li>";
                }
              
                if(!empty($message)) 
                {
                    echo "<script type='text/javascript'>alert('$message');</script>";

                } else{

                    $_SESSION['fname'] = $firstname;
                    $_SESSION['lname'] = $lastname;
                    
                    
                    $userfile = 'userdata.txt'; 
                    $userinfo= $firstname. ", ". $lastname. ", " . $password. "\n";
                    $fileopenr = fopen($userfile, 'r');
                    $fileread = fread($fileopenr, filesize($userfile));
                    $searchposition = strpos( $fileread, $userinfo);                   

                    if ($searchposition !== false) {
                        header("Location: main.php");
                    }
                    else {                       
                       //if the string is not found
                       echo "<script type='text/javascript'> alert('Please sign up to view my information');</script>";
                       header("Location: signup.php");                      
                    }
                    fclose($fileopenr);                  
                    exit;

                }              
            }
        ?> 
    </div>
</body>
</html>
