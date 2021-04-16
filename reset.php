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
                <input type="email" id="email" name="email" placeholder="test@email.com"><br><br>
                <input type="password" id="pword" name="pword" placeholder="PASSWORD"><br><br>
                <input type="submit" name="submit" value="submit">                
            </form>
        </div>
        <?php 

        if(isset($_POST['submit'])){

            $newpassword= $_POST['pword'];
            $emailinput=$_POST['email'];
            $message='';
           
            //$fileopena = fopen($userfile,"a");
           
            //session area
            $firstname= $_SESSION['fname'] ;
            $lastname= $_SESSION['lname'] ;
            $email=$_SESSION['email'];
        
            if(empty($newpassword)) {
                  $message .= "<li>Password cannot be empty</li>";
                }

                if(!empty($message)) {
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }else{
                    $userfile = 'userdata.txt';
                    $openfile = file('userdata.txt');
                    $fileopenr = fopen($userfile, 'r');
                    $fileread = fread($fileopenr, filesize($userfile));
                    $searchposition = strpos( $fileread, $email);     
                               

                    if ($searchposition === false) {
                        echo "<script type='text/javascript'>alert('Please sign up for a new account');</script>";         
                   }else{

                       foreach ($openfile as $user) {
                           $user_details = explode(',', $user);
                           
                           if ($email === $emailinput) {
                            if($user_details[2]===$email){

                                $search = $user_details[3];
                                $str = str_replace ( $search , $newpassword , $openfile );
                                $file_details=implode(',',$str);
                                $fileopena = fopen($userfile,"a");
                                fwrite($fileopena, $file_details);
                                fclose($fileopena);
                            }
                           }else{
                               $success=false;
                               echo $success;
                           }
                       }
                   }
                   fclose($fileopenr);
                   header("Location: landing.php");               
                   exit;
                }
        }

        ?>
</body>
</html>
<?php }else {
     header("Location: landing.php");
} ?>