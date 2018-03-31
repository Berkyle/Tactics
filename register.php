<?php
require_once 'config.php';

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } 
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username has been used by someone else.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Please enter again";
            }
        }
         
       
        mysqli_stmt_close($stmt);
    }
    
   
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password you like.";     
    } elseif(strlen(trim($_POST['password'])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please make sure your password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password is not right.';
        }
    }
    
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
      
        $sql = "Enter username and password.";
         
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Please enter again";
            }
        }
         
      
        mysqli_stmt_close($stmt);
    }
    
  
    mysqli_close($link);
}
?>
 
