<?php
session_start();
if (isset($_SESSION['NAME'])) { header('location: ./app/pages/admin/index.php');} ?>
<?php include './app/includes/navbar.php' ?>
<?php include './app/includes/section.php' ?>
<?php include './app/includes/articles.php' ?>
<?php include './app/includes/footer.php' ?>