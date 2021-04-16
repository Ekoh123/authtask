<?php
session_start();

if(count($_SESSION) != 0){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<style>
    .header{
        padding:2px;
        text-align: center;
    }
    .form{
        border: 1px solid #FB6600;
        padding:5px;
        font-size:20px;
        text-align:center;
        margin: auto;
        width:25%;
    }
    
</style>
<body>
        <div class="header">
            <h1>  RESET PASSWORD <h1>
            <h2> PLEASE ENTER YOUR EMAIL PASSWORD BELOW <h2>
        </div>
        <div class="form">
            <form method="POST">                                    
                <input type="password" id="pword" name="pword" placeholder="PASSWORD"><br><br>
                <input type="email" id="email" name="email" placeholder="test@email.com"><br><br>
                <input type="submit" name="submit" value="submit">                
            </form>
        </div>
        <?php 

        if(isset($_POST['submit'])){

            $newpassword= $_POST['pword'];
            $message='';

            $userfile = 'userdata.txt';
            $openfile = file('userdata.txt');
            $fileopena = fopen($userfile,"a");
            //$fileread = fread($fileopenr, filesize($userfile));

            //session area
            $firstname= $_SESSION['fname'] ;
            $lastname= $_SESSION['lname'] ;
        
            if(empty($newpassword)) {
                  $message .= "<li>Password cannot be empty</li>";
                }

                if(!empty($message)) {
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }else{
                    $success = false;
                    foreach ($openfile as $user) {
                        $user_details = explode(',', $user);
                        
                        if (trim($user_details[0]) == $firstname && trim($user_details[1]) == $lastname) {
                            $success = true;
                            echo $success;
                            $search = $user_details[2];
                            $str = str_replace ( $search , $newpassword , $openfile );
                            fwrite($fileopena, $str);
                            fclose($fileopena);
                            break;
                        }
                    }
                }
        }

        ?>
</body>
</html>
<?php }else {
     header("Location: landing.php");
} ?>