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
                    <li class="nav-item"><a  class="nav-link active" href="#"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="./articles.php"><i
                                class="fas fa-table"></i><span>Articles</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="./categorys.php"><i
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
                <div class="row ms-1 me-2">
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-start-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                            <span>Articles</span>
                                        </div>
                                        <div class="text-dark fw-bold h5 mb-0"><span><?= $_SESSION['AUTHORS'];
                                        unset($_SESSION['AUTHORS']) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="bi bi-pen fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                            <span>Authors</span>
                                        </div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>
                                                <?php echo $_SESSION['ARTICLES'];
                                                unset($_SESSION['ARTICLES']); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="bi bi-person-circle fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-start-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase text-warning fw-bold text-xs mb-1">
                                            <span>CATEGORIES</span>
                                        </div>
                                        <div class="text-dark fw-bold h5 mb-0"><span>
                                                <?= $_SESSION['CATEGORY'];
                                                unset($_SESSION['CATEGORY']) ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="bi bi-tags fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ms-4 me-4 mt-5">
                    <table class="table table-primary table-striped table-responsive hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">title</th>
                                <th scope="col">category</th>
                                <th scope="col">author</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php showingArticlesController(); ?>


                        </tbody>
                    </table>

                </div>
            </div>

            <footer class=" sticky-footer" style="background-color: #F9E79F;">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Abdellah EL GHOULAM 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../../assets/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>