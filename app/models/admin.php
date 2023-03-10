<?php
include 'db.php';
class Admin
{
    protected $name;
    protected $email;
    protected $password;
    protected $avatar;


    public function setName($name)
    {
        $this->name = $name;

    }
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

    }

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;


    }


    public function Login()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("SELECT * FROM `admin` WHERE email = '$this->email' AND password = '$this->password'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!isset($row['email'])) {

            $_SESSION['message'] = "Invalid email or password!";
            header('location: ../pages/login.php');

        } else {
            session_start();

            $_SESSION['ID'] = $row['id'];
            $_SESSION['NAME'] = $row['name'];
            $_SESSION['Avatar'] = $row['avatar'];
            header('location: ../pages/admin');
        }

    }


    public function SignUp()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("SELECT count(*) FROM `admin` WHERE email = '$this->email'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['count(*)'] == 1) {

            $_SESSION['message'] = "This email already exist !";
            header('location: ../pages/signup.php');

        } else {
            $db = new Db;
            $dbcon = $db->connect_pdo();
            $stmt = $dbcon->prepare("INSERT INTO `admin`( `name`,`avatar`, `email`, `password`) VALUES ('$this->name','$this->avatar','$this->email','$this->password')");
            $stmt->execute();
            header('location: ../pages/login.php');


        }
    }

    public static function ShowArticles()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare('SELECT article.id , article.title , article.text , article.thumbnail , article.idCategory , article.idadmin , admin.name , category.category FROM article , admin , category WHERE article.idCategory = category.id AND article.idadmin = admin.id;');
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $title = $row['title'];
            // $text = $row['text'];
            // $thumbnail = $row['thumbnail'];
            $name = $row['name'];
            $category = $row['category'];
            echo " <tr>
          <th scope='row'>$id </th>
          <td>$title</td>
          <td>$category</td>
           <td>$name</td>
           </tr>";
        }
    }

    public static function ShowCategorys()
    {

        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare('SELECT * FROM `category` ');
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $category = $row['category'];
            echo " <tr>
        <th scope='row'>$id </th>
        <td>$category</td>
        <td>
        <form action='../../controllers/admin-controller.php' method='get'>
        <button type='button' onclick='getctdata(`$id`,`$category`)' class='btn btn-warning type='button'  data-bs-toggle='modal'
        data-bs-target='#exampleModal11'><i class='bi bi-pen'></i> Edit</button>
        
        <a class='btn btn-danger' href='../../controllers/admin-controller.php?deleteCat=$id'><i class='bi bi-trash-fill'></i> Delete</a>
        </form>
        </td>
           </tr>";
        }

    }

    public static function ShowArticles2()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare('SELECT article.id , article.title , article.text , article.thumbnail , article.idCategory , article.idadmin , admin.name , category.category FROM article , admin , category WHERE article.idCategory = category.id AND article.idadmin = admin.id;');
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $title = $row['title'];
            // $text = $row['text'];
            // $thumbnail = $row['thumbnail'];
            $thu = $row['thumbnail'];
            $name = $row['name'];
            $category = $row['category'];
            $text = $row['text'];
            $categoryid = $row['idCategory'];
            echo " <tr>
            <th scope='row'>$id </th>
            <td>$title</td>
            <td>$category</td>
            <td>$name</td>
           <td>
           <div>
           <form action='../../controllers/admin-controller.php' method='get'>
           <button  onclick='getDataView(`$title`,`$text`,`$category`,`../../assets/img/$thu`)' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal1'><i class='bi bi-eye-fill'></i> View</button>
           <button type='button'  onclick='getData($id,`$title`,`$text`,$categoryid)'  class='btn btn-warning editbtn' type='button' class='btn btn-primary' data-bs-toggle='modal'
           data-bs-target='#exampleModal'><i class='bi bi-pen'></i> Edit</button>
           <a class='btn btn-danger' href='../../controllers/admin-controller.php?deleteid=$id'><i class='bi bi-trash-fill'></i> Delete</a>
           </form>
             </div>
           </td>
           </tr>";
        }
    }


    public function countArticles()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare('SELECT COUNT(*) FROM `admin`');
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['COUNT(*)'];

    }

    public function countAuthors()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare('SELECT COUNT(*) FROM `article`');
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['COUNT(*)'];

    }
    public function countcategorys()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare('SELECT COUNT(*) FROM `category` ');
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['COUNT(*)'];

    }

    public static function createCategory($category)
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("INSERT INTO `category`( `category`) VALUES ('$category')");
        $stmt->execute();

    }



    public static function ShowArticlesBySearch($search)
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("SELECT article.id , article.title , article.text , article.thumbnail , article.idCategory , article.idadmin , admin.name , category.category FROM article , admin , category WHERE article.idCategory = category.id AND article.idadmin = admin.id AND article.title LIKE '%$search%'");
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count>0){
        
        $quer = $dbcon->prepare("SELECT article.id , article.title , article.text , article.thumbnail , article.idCategory , article.idadmin , admin.name , category.category FROM article , admin , category WHERE article.idCategory = category.id AND article.idadmin = admin.id AND article.title LIKE '%$search%'");
        $quer->execute();
        $row = $quer->fetch(PDO::FETCH_ASSOC);
                return $row;

        }else{
            $_SESSION['messageerr'] = "theres no article with this title!";
            header('location: ../pages/admin/articles.php');
        }


    }


    public static function deleteArticle($id)
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("DELETE FROM `article` WHERE id = $id ");
        $stmt->execute();
        $_SESSION['message'] = "Article has been deleted!";
        header('location: ../pages/admin/articles.php');
    }


    public static function CreateArticle($title, $text, $thumbnail, $idCat)
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $id = $_SESSION['ID'];
        $stmt = $dbcon->prepare("INSERT INTO `article`( `title`, `text`, `thumbnail`, `idCategory`, `idAdmin`) VALUES ('$title','$text','$thumbnail',$idCat,$id)");
        $stmt->execute();
        $_SESSION['message'] = "Article has been Added!";
        header('location: ../pages/admin/articles.php');



    }

    public static function ShowCategoryOnForm()
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare('SELECT * FROM `category`');
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public static function EditArticle($id, $title, $text, $thumbnail, $idCat)
    {

        $db = new Db;
        $dbcon = $db->connect_pdo();

        if (empty($thumbnail)) {
            $stmt = $dbcon->prepare("UPDATE `article` SET `title` = '$title', `text` = '$text', `idCategory` = '$idCat' WHERE `article`.`id` = $id");
            $stmt->execute();
            $_SESSION['message'] = "Article has been Added!";
            header('location: ../pages/admin/articles.php');
        } else {
            $stmt = $dbcon->prepare("UPDATE `article` SET `title` = '$title', `text` = '$text', `thumbnail` = '$thumbnail', `idCategory` = '$idCat' WHERE `article`.`id` = $id");
            $stmt->execute();
            $_SESSION['message'] = "Article has been Added!";
            header('location: ../pages/admin/articles.php');

        }




    }


    public static function EditCategory($id, $category)
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("UPDATE `category` SET `category`='$category' WHERE id = $id");
        $stmt->execute();
        $_SESSION['message'] = "Category has been updated!";
        header('location: ../pages/admin/categorys.php');
    }

    public static function deleteCategory($id)
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("SELECT COUNT(*) FROM article WHERE idCategory= $id");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result['COUNT(*)']>0){
            $_SESSION['messageerr'] = "Category Cannot Get Deleted!";
            header('location: ../pages/admin/categorys.php');

        } else{

        }
        $db = new Db;
        $dbcon = $db->connect_pdo();
        $stmt = $dbcon->prepare("DELETE FROM `category` WHERE id = $id ");
        $stmt->execute();
        $_SESSION['message'] = "Article has been deleted!";
        header('location: ../pages/admin/categorys.php');
    }


    public static function UpdateProfile($id, $name, $avatar, $email, $password)
    {
        $db = new Db;
        $dbcon = $db->connect_pdo();
        if (!empty($avatar)) {
            $stmt = $dbcon->prepare("UPDATE `admin` SET `name`='$name',`avatar`='$avatar',`email`='$email',`password`='$password' WHERE id = $id");
            $stmt->execute();
            $_SESSION['message'] = "info updated!";
            header('location: ../pages/admin/profile.php');

        } else {
            $stmt = $dbcon->prepare("UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password' WHERE id = $id");
            $stmt->execute();
            $_SESSION['message'] = "info updated!";
            header('location: ../pages/admin/profile.php');
        }



    }

    public static function LogOut()
    {

        session_start();

        unset($_SESSION['ID']);
        unset($_SESSION['NAME']);

        session_destroy();


        header('location: ../../index.php');
    }



}