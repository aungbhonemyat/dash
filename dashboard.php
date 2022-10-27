<?php
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="img/glass-white.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/glass-white.png">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/bootstrap.min.js" defer></script>

</head>

<body>
    <div class="container-fluid mt-2">
        <div class="row g-0" style="box-shadow:  0 2px 2px 2px rgb(104, 108, 109);">
            <nav class="col-2 bg-light">

                <h1 class="h4  text-center">
                    <a class="navbar-brand h1" href="dashboard.php">
                        <img src="img/glass-brand.png" width="80px" alt=""></a>
                    </a>
                </h1>
                <div class="list-group text-center text-lg-start ">
                <span class="list-group-item disabled d-none d-lg-block">
                    <small>CONTROLS</small> </span>
                    <ul class="nav-link nav">
                        <li>
                            <a href="dashboard.php" class="list-group-item p-5 action active"> <i class="fas fa-home"></i>
                                <span class="d-none d-lg-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="customer/index.php" class="list-group-item p-5"> <i class="fas fa-users"></i>
                                <span class="d-none d-lg-inline">Customers</span>
                                <!-- <span class="d-none d-lg-inline badge bg-danger
                        rounded-pill float-end">20</span> -->
                            </a>
                        </li>
                        <li>
                            <a href="invoices/index.php" class="list-group-item p-5"> <i class="fa-solid fa-file-invoice-dollar"></i>
                                <span class="d-none d-lg-inline">Invoices</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a class=" list-group-item px-5 p-5 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-chart-line"></i>

                                <span class="d-none d-lg-inline">Invoices</span><i class="fas fa-sort-down p-2"></i>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <a href="invoices/index.php" class="list-group-item">
                                        Main
                                    </a>
                                </div>
                                <div class="card card-body">
                                    <a href="#" class="list-group-item">
                                        Draft
                                    </a>
                                </div>
                            </div>
                        </li> -->
                        <li>
                            <a href="delivery/index.php" class="list-group-item p-5"> <i class="fas fa-truck"></i>
                                <span class="d-none d-lg-inline">Delivery</span>
                            </a>
                        </li>
                        <li>
                            <a href="retran/index.php" class="list-group-item p-5"> <i class="fas fa-reply"></i>
                                <span class="d-none d-lg-inline">Re/Trans</span>
                            </a>
                        </li>
                        <li>
                            <a href="products/index.php" class="list-group-item p-5"> <i class="fab fa-product-hunt"></i>
                                <span class="d-none d-lg-inline">Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="cargo/index.php" class="list-group-item p-5"> <i class="fas fa-cart-arrow-down"></i>
                                <span class="d-none d-lg-inline">Cargo</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- <div class="list-group mt-3 text-center text-lg-start">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>ACTIONS</small></span>

                    <a href="#" class="list-group-item"><i class="fas fa-home"></i>
                        <span class="d-none d-lg-inline">New Users</span>
                    </a>
                    <a href="#" class="list-group-item"><i class="fas fa-edit"></i>
                        <span class="d-none d-lg-inline">Update data</span>
                    </a>
                    <a href="#" class="list-group-item"><i class="fas fa-calendar-alt"></i>
                        <span class="d-none d-lg-inline">New Events</span>
                    </a>
                </div> -->
            </nav>

            <main class="col-10 text-white bg-black">
                <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
                    <div class="flex-fill"></div>
                    <div class="navbar-nav">
                    
                        <li class="nav-item p-2">
                            <h5 class="text-dark p-1">Admin</h5>
                        </li>
                        <li class="nav-item p-1">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"></a>

                            <ul class="dropdown-menu dropdown-menu-end p-2">
                                <li>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </nav>
                <div class="container-fluid mt-3 p-4">
                    <!-- <div class="row mb-3">
                        <div class="col">
                            <div class="alert alert-info">
                                <i class="fas fa-download me-2"></i>
                                A new version of admin dashboard is released. <a href="#">Download Now!</a>
                            </div>
                        </div>
                    </div> -->

                    <div class="row flex-column flex-lg-row text-dark">
                        <h2 class="h6 text-white-50">QUICK STATS</h2>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">
                                        <?php
                                        $dash_customer_query = "SELECT * FROM customers";
                                        $dash_customer_query_run = mysqli_query($con, $dash_customer_query);

                                        if ($customer_total = mysqli_num_rows($dash_customer_query_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $customer_total . '</h2>';
                                        } else {
                                            echo '<h3 class="mb-0"> NO data </h3>';
                                        }
                                        ?>
                                    </h3>
                                    <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Total Customers
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">
                                        <?php
                                        $dash_query = "SELECT * FROM invoices";
                                        $dash_run = mysqli_query($con, $dash_query);

                                        if ($total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $total . '</h2>';
                                        } else {
                                            echo '<h3 class="mb-0"> NO data </h3>';
                                        }
                                        ?>
                                    </h3> <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Total invoices
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">
                                    <?php
                                        $dash_query = "SELECT * FROM products";
                                        $dash_run = mysqli_query($con, $dash_query);

                                        if ($total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $total . '</h2>';
                                        } else {
                                            echo '<h3 class="mb-0"> NO data </h3>';
                                        }
                                        ?>
                                    </h3> <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Total Products
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">
                                    <?php
                                        $dash_query = "SELECT * FROM transfer";
                                        $dash_run = mysqli_query($con, $dash_query);

                                        if ($total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $total . '</h2>';
                                        } else {
                                            echo '<h3 class="mb-0"> NO data </h3>';
                                        }
                                        ?> </h3><span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Total Retransfer Lists
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">
                                    <?php
                                        $dash_query = "SELECT * FROM delivery";
                                        $dash_run = mysqli_query($con, $dash_query);

                                        if ($total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $total . '</h2>';
                                        } else {
                                            echo '<h3 class="mb-0"> NO data </h3>';
                                        }
                                        ?>
                                    </h3> <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Delivery Lists
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 flex-column flex-lg-row">
                        <!-- <div class="col">
                        <h2 class="h6 text-white-50">LOCATION</h2>
                        <div class="card mb-3" style="height: 280px">
                            <div class="card-body">
                                <small class="text-muted">Regional</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-success w-25"></div>
                                </div>
                                <small class="text-muted">Global</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-primary w-75"></div>
                                </div>
                                <small class="text-muted">Local</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-warning w-50"></div>
                                </div>
                                <small class="text-muted">Internal</small>
                                <div class="progress mb-4 mt-2" style="height: 5px">
                                    <div class="progress-bar bg-danger w-25"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <div class="col">
                            <h2 class="h2 text-white-50 text-center p-3">Dashboard</h2>
                            <div class="card mb-3" style="height:550px">
                                <div class="card-body">
                                    <div class="text-end">
                                        <button class="btn btn-smbtn-outline-secondary"> <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-sort-amount-up"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-filter"></i> </button>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <th>ID</th>
                                            <th>Age Group</th>
                                            <th>Data</th>
                                            <th>Progress</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>20-30</td>
                                            <td>19%</td>
                                            <td>
                                                <i class="fas fa-chart-pie"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>30-40</td>
                                            <td>40%</td>
                                            <td>
                                                <i class="fas fa-chart-bar"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>40-50</td>
                                            <td>20%</td>
                                            <td>
                                                <i class="fas fa-chart-line"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>>50</td>
                                            <td>11%</td>
                                            <td>
                                                <i class="fas fa-chart-pie"></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="progress">
                    <div class="progress-bar bg-danger"></div>
                </div> -->
                </div>
            </main>
            <footer class="text-center py-4 text-muted"> &copy; Copyright 2020
            </footer>
        </div>
    </div>

</body>

</html>