<?php
require '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customers</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/bootstrap.min.js" defer></script>

</head>

<body>
    <div class="container-fluid mt-2">

        <div class="row g-0" style="box-shadow:  0 2px 2px 2px rgb(104, 108, 109);">
            <nav class="col-2 bg-light">

                <h1 class="h4  text-center">
                    <a class="navbar-brand h1" href="../dashboard.php">
                        <img src="img/glass-brand.png" width="80px" alt=""></a>
                    </a>
                </h1>
                <div class="list-group text-center text-lg-start ">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>CONTROLS</small> </span>
                    <ul class="nav-link nav">
                        <li>
                            <a href="../dashboard.php" class="list-group-item p-5"> <i class="fas fa-home"></i>
                                <span class="d-none d-lg-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="list-group-item p-5"> <i class="fas fa-users"></i>
                                <span class="d-none d-lg-inline">Customers</span>
                                <!-- <span class="d-none d-lg-inline badge bg-danger
rounded-pill float-end">20</span> -->
                            </a>
                        </li>
                        <li>
                            <a class=" list-group-item px-5 p-5 sidebar-link action active" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-chart-line"></i>

                                <span class="d-none d-lg-inline">Invoices</span><i class="fas fa-sort-down p-2"></i>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <a href="../invoices/index.php" class="list-group-item">
                                        Main
                                    </a>
                                </div>
                                <div class="card card-body">
                                    <a href="#" class="list-group-item">
                                        Draft
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="list-group-item p-5"> <i class="fas fa-truck"></i>
                                <span class="d-none d-lg-inline">Delivery</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item p-5"> <i class="fas fa-reply"></i>
                                <span class="d-none d-lg-inline">Re/Trans</span>
                            </a>
                        </li>
                        <li>
                            <a href="../products/index.php" class="list-group-item p-5"> <i class="fab fa-product-hunt"></i>
                                <span class="d-none d-lg-inline">Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item p-5"> <i class="fas fa-cart-arrow-down"></i>
                                <span class="d-none d-lg-inline">Cargo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-10 text-white bg-dark">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <div class="container-fluid mt-4 p-4">
                    <?php require('../message.php'); ?>


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
                                    </h3> <span class="text-success">
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
                                        $dash_product_query = "SELECT * FROM invoices";
                                        $dash_product_query_run = mysqli_query($con, $dash_product_query);

                                        if ($product_total = mysqli_num_rows($dash_product_query_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $product_total . '</h2>';
                                        } else {
                                            echo '<h3 class="mb-0"> NO data </h3>';
                                        }
                                        ?>
                                    </h3> <span class="text-success">
                                        <i class="fas fa-chart-line"></i>
                                        Total invoices
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">50k +</h3> <span class="text-success">
                                        <i class="fas fa-chart-line"></i>
                                        Total cashed In
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">20k +</h3> <span class="text-success">
                                        <i class="fas fa-chart-line"></i>
                                        Mobile Banking
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">1k +</h3> <span class="text-success">
                                        <i class="fas fa-chart-line"></i>
                                        Receivables
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-5 p-5">

                        <!-- <h2 class="h6 text-white-50">DATA</h2> -->
                        <div class="card mb-3" style="height:100%">
                            <div class="card-body">
                                <div class="text-end">
                                    <h3 class="float-end text-black"> Add Customers</h3>
                                </div>
                                <div class="container mt-5">
                                    <?php require('../message.php'); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card text-black">
                                                <div class="card-header">
                                                    <h4>Customer Add
                                                        <a href="customer.php" class="btn btn-secondary float-end text-white ">Back</a>
                                                    </h4>
                                                </div>
                                                <div class="card-body ">
                                                    <form action="code.php" method="post">
                                                        <div class="mb-3">
                                                            <label>Customer Name</label>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Customer Email</label>
                                                            <input type="text" name="email" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Customer Phone</label>
                                                            <input type="text" name="phone" class="form-control">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label>City</label>
                                                                <input type="text" name="city" class="form-control">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label>Township</label>
                                                                <input type="text" name="town" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <button type="submit" name="save_customer" class="btn btn-primary">Save Customer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="text-center py-4 text-muted"> &copy; Copyright 2020
                    </footer>
                </div>
        </div>

</body>

</html>