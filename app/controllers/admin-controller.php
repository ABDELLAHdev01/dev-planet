<?php

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
        $email_error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }

     // Validate password
     if (empty($password)) {
        $password_error = "Password is required";
        echo "Password is required";
    } elseif (strlen($password) < 8) {
        $password_error = "Password must be at least 8 characters";
    }


    if (empty($email_error) && empty($password_error)) {
        $login = new Admin($email,$password);
        $login->Login();
        echo 'done';
    }

   


}


function signUpController(){
    $name = $_POST['signUpName'];
    $email = $_POST['signUpEmail'];
    $password = $_POST['signUpPassword'];
    $repassword = $_POST['signUprePassword'];
    if($password == $repassword){

        if (empty($name)) {
            $name_error = "Name is required";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_error = "Only letters and white space allowed";
        }    


           // Validate email
     if (empty($email)) {
        $email_error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }

     // Validate password
     if (empty($password)) {
        $password_error = "Password is required";
        echo "Password is required";
    } elseif (strlen($password) < 8) {
        $password_error = "Password must be at least 8 characters";
    }


    if (empty($name_error) && empty($email_error) && empty($password_error)) {
        $signUp = new Admin($email, $password);
        $signUp->setName($name);
        $signUp->SignUp();
            echo 'done';
    }
    }
  
    

}