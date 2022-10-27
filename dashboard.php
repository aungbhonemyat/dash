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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

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
                                        $invoices_query = "SELECT * FROM invoices";
                                        $dash_run = mysqli_query($con, $invoices_query);

                                        if ($invoices_total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $invoices_total . '</h2>';
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
                                        $products_query = "SELECT * FROM products";
                                        $dash_run = mysqli_query($con, $products_query);

                                        if ($products_total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $products_total . '</h2>';
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
                                        $transfer_query = "SELECT * FROM transfer";
                                        $dash_run = mysqli_query($con, $transfer_query);

                                        if ($transfer_total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $transfer_total . '</h2>';
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
                                        $delivery_query = "SELECT * FROM delivery";
                                        $dash_run = mysqli_query($con, $delivery_query);

                                        if ($delivery_total = mysqli_num_rows($dash_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $delivery_total . '</h2>';
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
                        <div class="col">
                            <h2 class="h2 text-white-50 text-center p-3">Dashboard</h2>
                            <div class="card mb-1" style="height:550px">
                                <div class="card-body">
                                <canvas id="chart" width="400" height="200"></canvas>
                                    <script>
                                        const ctx = document.getElementById('chart').getContext('2d');
                                        const myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Customer', 'invoices', 'products', 'transfer list', 'delivery'],
                                                datasets: [{
                                                    label: 'Count',
                                                    data: [<?= $customer_total?>, <?=$invoices_total?>,<?=$products_total?>,<?= $transfer_total ?>,<?= $delivery_total?>],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255, 99, 132, 1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    </script>
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