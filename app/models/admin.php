<?php
include 'db.php';
session_start();
class Admin 
{
    protected $name;
    protected $email;
    protected $password;


public function setName($name){
    $this->name = $name;

}

    public function __construct($email,$password){
        $this->email = $email;
        $this->password = $password;
       

    }


    public function Login(){
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("SELECT `id`, `name`, `email`, `password` FROM `admin` WHERE email = '$this->email' AND password = '$this->password'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!isset($row['email'])) {

            $_SESSION['message'] = "Invalid email or password!";
            header('location: ../pages/login.php');

        } else {
            print_r($row);
            echo $row['name'];
            // header('location: ../pages/login.php');
        }
         
    }


    public function SignUp(){
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("SELECT count(*) FROM `admin` WHERE email = '$this->email'");
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['count(*)'] == 1){
 
            $_SESSION['message'] = "This email already exist !";
            header('location: ../pages/signup.php');
       
           }
        else{
            $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("INSERT INTO `admin`( `name`, `email`, `password`) VALUES ('$this->name','$this->email','$this->password')");
        $stmt->execute();
        header('location: ../pages/dasboard.php');

       
       }

        


    }






}


