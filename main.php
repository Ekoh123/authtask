<?php
session_start();

if( $_SESSION['fname'] && $_SESSION['lname'] ){


?> 

    <h1 style="text-align: center">WELCOME TO MY DIARY <?php $firstname?></h1>
    <br>
    <p style="text-align: center">Now that you have finished gossiping, please sign out</p>
    <br><br>
    <form method="POST">
    <input type="submit" name="signout" value="SIGNOUT">
    <br><br>
    <input type="submit" name="reset" value="RESET">
    </form>

    <?php 

        if(isset($_POST['signout'])){
            session_unset();
            session_destroy();
            header("Location: landing.php");
        }elseif (isset($_POST['reset'])) {
            header("Location: reset.php");
        }
    }else{
        header("Location: landing.php"); 
    }
    ?>