<?php 
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
            include '_dbconnect.php';
        $user_email=$_POST['emailSignup'];
        $pass=$_POST['signuppass'];
        $cpass=$_POST['signupcpass'];

        //VALIDATING LOGIN CRIDENTIALS
        //check wether this email exists or not


        $existSql="SELECT * FROM `users` WHERE user_email='$user_email'";
        $result=mysqli_query($conn,$existSql);
        $numRows=mysqli_num_rows($result);
            if($numRows>0){
                $showError= "Email is alreadey registered";
                }
    //Hash the password and stroe into database

        if($pass==$cpass){
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                echo $result;
                if($result){
                    $showAlert=true;
                 header("Location:/onlineForum/index.php?signupsuccess=true");
                 exit();
                }
        
            }
    else{
        $showError= "Password and Confirm Password should match";    
      }
      
   header("Location:/onlineForum/index.php?signupsuccess=false&error=$showError");

}

?>