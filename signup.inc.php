<?php
include 'dbcon.php' ;
function test_input($data) {
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
if(isset($_POST['submit'])) {
    
    $first = test_input($_POST['first']);
    $last = test_input($_POST['last']);
    $email = test_input($_POST['email']);
    $uid = test_input($_POST['uid']);
    $pwd = test_input($_POST['pwd']);

    //error handlers 
    // check empty fields
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) ) {
        header("Location:signup.php?signup=empty");
        exit();
    } else {
        // check input values 
        if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last) 
         ) {
            header("Location:signup.php?signup=invalid");
            exit();
         } else {
             //check email is valid 
             if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                header("Location:signup.php?signup=invalid_email");
                exit();                  
             } else {
                 //check username is already exist or not
                 $sql = "SELECT * FROM users WHERE user_uid ='$uid' ";
                 $result = mysqli_query($conn,$sql);
                 $resultcheck = mysqli_num_rows($result);
                 if($resultcheck>0) {
                    header("Location:signup.php?signup=uid_taken");
                    exit();
                 } else {
                     $newpwd = md5($pwd);
                     // insert data into database 
                     $query = "INSERT INTO users(user_first , user_last , 
                     user_email , user_uid , user_pwd) VALUES ('$first' ,'$last',
                     ,'$email','$uid' ,'$newpwd')   ";
                    $fire = mysqli_query($conn,$query);   
                                                      
                    header("Location:index.php?signup=sucess");                    
                    exit();
                   
                 }
             }
         }
        
        }


    
    
} else {
    header("Location:../signup.php");
    exit();
}
?>