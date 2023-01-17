<?php
session_start();
include '../models/autoloader.php';



if (isset($_POST['login'])) loginController();
if (isset($_POST['signUp'])) signUpController();


function loginController(){
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    //security
    $email = trim($email);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = trim($password);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

     // Validate email
     if (empty($email)) {
        $email_error = "Email is required!";

        $_SESSION['message'] = "Email is required!";
        header('location: ../pages/login.php');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Email is invalid format";
        $_SESSION['message'] = "Invalid email format!";
        header('location: ../pages/login.php');
    }

     // Validate password
     if (empty($password)) {
        $password_error = "Password is required";
        $_SESSION['message'] = "Password is required !";
        header('location: ../pages/login.php');
    
    } elseif (strlen($password) < 8) {
        $password_error = "Password must be at least 8 characters!";

        $_SESSION['message'] = "Password must be at least 8 characters!";
        header('location: ../pages/login.php');
    }


    if (empty($email_error) && empty($password_error)) {
        $login = new Admin($email,$password);
        $login->Login();

    }

   


}


function signUpController(){
    $name = $_POST['signUpName'];
    $email = $_POST['signUpEmail'];
    $password = $_POST['signUpPassword'];
    $repassword = $_POST['signuprePassword'];
    if($password == $repassword){

        if (empty($name)) {
            $name_error = "Name is required";
            $_SESSION['message'] = "Name is required!";
            header('location: ../pages/signup.php');
            
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_error = "Only letters and white space allowed";
            $_SESSION['message'] = "Name is required!";
            header('location: ../pages/signup.php');
        }    


           // Validate email
     if (empty($email)) {
        $email_error = "Email is required";
        $_SESSION['message'] = "Email is required";
            header('location: ../pages/signup.php');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
        $_SESSION['message'] = "Invalid email format";
        header('location: ../pages/signup.php');
    }

     // Validate password
     if (empty($password)) {
        $password_error = "Password is required";
        $_SESSION['message'] = "Password is required";
            header('location: ../pages/signup.php');
    } elseif (strlen($password) < 8) {
        $password_error = "Password must be at least 8 characters";
        $_SESSION['message'] = "Password must be at least 8 characters";
            header('location: ../pages/signup.php');
    }


    if (empty($name_error) && empty($email_error) && empty($password_error)) {
        $signUp = new Admin($email, $password);
        $signUp->setName($name);
        $signUp->SignUp();
            echo 'done';
    }
    }
  
    

}