<?php
session_start();

if( $_SESSION['fname'] && $_SESSION['lname'] ){


?> 

<style>
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
    <div>
        <h1 style="text-align: center">WELCOME TO MY DIARY <?php $firstname?></h1>
        <br>
        <h2 style="text-align: center">Now that you have finished gossiping, please sign out</h2>
    </div>
    <br><br>
    <div class="form">
        <form method="POST">
        <input type="submit" name="signout" value="SIGNOUT">
        <input type="submit" name="reset" value="RESET">
        </form>
    </div>

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