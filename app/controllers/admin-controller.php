<?php
if(null !== session_start()){

}else{
    session_start();
}

// include_once '../models/autoloader.php';
include_once($_SERVER['DOCUMENT_ROOT'] . '\dev-planetv1\app\models\autoloader.php');


if (isset($_POST['login']))
    loginController();
if (isset($_POST['signUp']))
    signUpController();
if (isset($_POST['addCategory']))
    addCategoryContoller();
if (isset($_POST['addcategory2']))
    addCategoryContoller2();
if (isset($_POST['Search']))
    showingArticlesSearchController();
if (isset($_GET['deleteid']))
    deleteArticleController();
if (isset($_POST['create']))
    CreateArticleController();
if (isset($_POST['editbtn']))
    EditArticleController();
if (isset($_POST['UpdateCategory']))
    EditCategoryController();

function loginController()
{
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
        $login = new Admin($email, $password);
        $login->Login();


    }




}


function signUpController()
{
    $name = $_POST['signUpName'];
    $email = $_POST['signUpEmail'];
    $password = $_POST['signUpPassword'];
    $repassword = $_POST['signuprePassword'];
    if ($password == $repassword) {

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
        }
    }else if($password != $repassword){
        $_SESSION['message'] = "The passwords do not match. Please re-enter your password!";
        header('location: ../pages/signup.php');

    }


}

function showCount()
{
    $admin = new Admin(" ", " ");
    $_SESSION['ARTICLES'] = $admin->countArticles();
    $_SESSION['AUTHORS'] = $admin->countAuthors();
    $_SESSION['CATEGORY'] = $admin->countcategorys();
}




function ShowingCategotys(){
    Admin::ShowCategorys();
}

function showingArticlesController()
{
    Admin::ShowArticles();
    // $showingtb = new Admin("","");
    // $showingtb->ShowArticles();


}
function showingArticlesController2()
{
    Admin::ShowArticles2();
    // $showingtb = new Admin("","");
    // $showingtb->ShowArticles();


}
function showingArticlesSearchController()
{
    $res = Admin::ShowArticlesBySearch($_POST['keyword']);

    $id = $res['id'];
    $title = $res['title'];
    $category = $res['category'];
    $name = $res['name'];
    $_SESSION['article'] = " <tr>
    <th scope='row'>$id</th>
      <td>$title</td>
      <td>$category</td>
       <td>$name</td>
       <td></td>
       </tr>";

    header('location: ../pages/admin/articles.php');


}



function addCategoryContoller()
{
    $cat = $_POST['thecategory'];
    Admin::createCategory($cat);
    $_SESSION['message'] = "Category has been added!";
    header('location: ../pages/admin/articles.php');

}
function addCategoryContoller2()
{
    $cat = $_POST['thecategory2'];
    Admin::createCategory($cat);
    $_SESSION['message'] = "Category has been added!";
    header('location: ../pages/admin/categorys.php');

}



function deleteArticleController()
{
    Admin::deleteArticle($_GET['deleteid']);
    // header('location: ../pages/admin/articles.php');


}




function ShowCategoryOnFormController()
{
    $res = Admin::ShowCategoryOnForm();

    foreach ($res as $row) {
        $id = $row['id'];
        $category = $row['category'];
        echo "
        <option value='$id'>$category</option>

        
        ";
    }


}



function CreateArticleController(){
    $title = $_POST['title'] ;
    $text = $_POST['text'];
   
    $idCat = $_POST['idCat'];
    $picture = $_FILES['picture'];
    move_uploaded_file($picture['tmp_name'], '../assets/img/' . $picture['name']);
    Admin::CreateArticle($title,$text,$picture['name'],$idCat);

}
function EditArticleController(){
    $id = $_POST['id'];
    $title = $_POST['title'] ;
    $text = $_POST['text'];
    $idCat = $_POST['idCat'];
    $picture = $_FILES['picture'];
    move_uploaded_file($picture['tmp_name'], '../assets/img/' . $picture['name']);
    Admin::EditArticle($id, $title, $text, $picture['name'], $idCat);

}

function EditCategoryController(){
    $id = $_POST['idcate'];
    $category = $_POST['thecategory2'];

    


}
