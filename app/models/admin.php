<?php
include 'db.php';

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
        $stmt = $dbcon->prepare("SELECT `id`, `name`, `email`, `password` FROM `admin` WHERE email = '$this->email'");
        $stmt->execute();
        $row = $stmt->fetch();
        if (!$row) {
            echo "Email Is not valid !";
        } else {
            if ($row['password'] == $this->password) {
                // echo $row['name'];
            } else {
                echo "Password Wrong !";
            }
        }
    }


    public function SignUp(){
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("INSERT INTO `admin`( `name`, `email`, `password`) VALUES ('$this->name','$this->email','$this->password')");
        $stmt->execute();



    }






}


