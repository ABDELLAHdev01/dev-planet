<?php

include '../../controllers/admin-controller.php';
include '../../models/admin.php';
if(!isset($_SESSION['NAME'])){
    header('location: ../../../index.php');

}
$name = $_SESSION['NAME'];
$avatar = $_SESSION['Avatar'];

showCount();
// include '../../controllers/admin-controller.php';
// if(!isset($_SESSION['ID'])){
//     header('location: ../../index.php');

// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/Style.css">
    <link rel="icon" href="../../assets/img/icon.png" type="image/x-icon">

    <title>Dashboard - DEV PLANET</title>
</head>

<body id="page-top" style="background-color: #F9E79F;">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bgyl ">
            <div class="container-fluid d-flex flex-column p-0"><a
                    class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="bi bi-shield-shaded"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>DEV PLANET</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a  class="nav-link " href="./index.php"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="./profile.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="./articles.php"><i
                                class="fas fa-table"></i><span>Articles</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="./categorys.php"><i
                                class="bi bi-tags-fill"></i><span>Categorys</span></a></li>

                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="background-color: #F9E79F;">

                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid" style="background-color: #F9E79F;"><button
                            class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i
                                class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow">
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in"
                                    aria-labelledby="searchDropdown">

                                </div>
                            </li>


                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                                aria-labelledby="alertsDropdown"></div>
                            </li>

                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                                            class="d-none d-lg-inline me-2 text-gray-600 ">
                                            <?= $name ?>
                                        </span><img class="border rounded-circle img-profile"
                                            src="../../assets/img/<?= $avatar ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a
                                            class="dropdown-item" href="./profile.php"><i
                                                class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><form action="../../controllers/admin-controller.php" method="post"><button class="dropdown-item"
                                            type="submit" name="LogOut"></form><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show ms-4 me-3">
                        <strong>Done !</strong> <span style="font-size: 0.9rem;">
                            <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                        </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                    </div>
                <?php endif ?>
                <?php if (isset($_SESSION['messageerr'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show ms-4 me-3">
                        <strong>Ops !</strong> <span style="font-size: 0.9rem;">
                            <?php
                            echo $_SESSION['messageerr'];
                            unset($_SESSION['messageerr']);
                            ?>
                        </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                    </div>
                <?php endif ?>
              
                <div class="d-flex mb-3 ms-4  me-4 justify-content-end justify-content-between ">
                    <button  id="showbtn" class="btn btn-warning" type="button" onclick="hideTheCatbtnadd()" data-bs-toggle="modal" data-bs-target="#exampleModal11"><i class="bi bi-bookmark-plus"></i> Add Category</button>
                </div>
                <div class="ms-4 me-4 mt-5">
                    <table class="table table-primary table-striped table-responsive hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                               
                                <th scope="col">category</th>
                                <th scope="col">Action</th>
                              
                            </tr>
                        </thead>
                        <tbody>

                        <?php ShowingCategotys() ?>
                        </tbody>
                    </table>

                </div>
            </div>


            <!-- modal -->

            <!-- Modal -->
<div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Categorys</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../../controllers/admin-controller.php" method="POST">
                                         <input type="hidden" id="idcat" name="idcate">
                                         <div class="d-flex">
                                        <input id="categoryedit" name="thecategory2[]" type="text" class="form-control mb-3 me-2"
                                        placeholder="Category name" required="" autofocus="" /> <button type="button" id="btnaddmorecategory"  class="btn btn-primary h-50 w-50" onclick="addNewCat()">Add More </button>
      </div>        
      <div id="container-cat">

      </div>
      
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  
        <button name="addcategory2" type="submit" class="btn btn-warning" id="addbt">Add</button>
        <button name="UpdateCategory" type="submit" class="btn btn-warning" id="delbt">Update</button>

        </form>

        
      </div>
    </div>
  </div>
</div>

            <footer class=" sticky-footer" style="background-color: #F9E79F;">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright ?? Abdellah EL GHOULAM 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../../assets/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>