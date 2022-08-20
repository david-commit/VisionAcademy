<?php
session_start();
include "../process.php";

//user login
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email = '$email'AND password = '$password'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);
    $_SESSION["uid"] = $row["admin_id"];
    $_SESSION["name"] = $row["fname"];

    if(empty($email) || empty($password)){
        $_SESSION['error'] = 'Fill in the form first';
        header('location:login.php');
    }
    else{
        if ($count == 1){
            echo 'login_success';
            header('location: index.php');
        }
        else{
            $_SESSION['error'] = 'Incorrect login credentials';
            header('location:login.php');
        }
    }
}



?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Login Admin | Vision Academy</title>
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="login.css" type="text/css">
</head>
<body>
<div class="contact_form">
    <?php

    if(isset($_SESSION['error'])){
        echo "
          <div class='alert alert-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['success'])){
        echo "
          <div class='alert alert-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
    }
    ?>
    <h1>Admin Login</h1>
    <form action="" method="POST">
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" placeholder="info@gmail.com" required>
        <br>
        <label for="password">Password</label><br>
        <input type="password" name="password" placeholder="Password" id="Password">
        <br>
        <button type="submit" name="login">Submit</button>
        <button type="reset">Reset</button>
    </form>
</div>
</body>
</html>