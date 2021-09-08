<?php
session_start();
include ('db.php');
if(isset($_POST['admin_login'])){
    function validate ($creds){
        $creds = trim($creds);
        $creds = stripslashes($creds);
        $creds = htmlspecialchars($creds);
        return $creds;
    }
    $username = validate($_POST['admin_name']);
    $password = validate($_POST['admin_pass']);
    $login = "SELECT * FROM `users` WHERE username='$username' AND password='$password' ";
    $result= mysqli_query($con,$login);
    if (mysqli_num_rows($result) === 1 ){
       $row = mysqli_fetch_assoc($result);
       if($row['username'] === $username && $row['password'] === $password){
           echo "login success";
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            header('Location:dashboard.php');
       } else{
            header('Location:login?error=Incorrect Username or Password');
            exit();
       }

    } else {
        header('Location:login?error=Incorrect Username or Password');
        exit();
    }
    
}
else{
    header('Location:login');
    exit();
}

?> 