<?php
session_start();
require '../dbcon.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 10;
$start_from = ($page - 1) * 10;

$qquery = "SELECT * FROM products limit $start_from,$num_per_page";
$query_runn = mysqli_query($con, $qquery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="../img/glass-white.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/glass-white.png">
    <title>Products</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/bootstrap.min.js" defer></script>
    <style>
        .pages {
            border-radius: 50% !important;
            margin-left: .5rem;
            margin-right: .5rem;
            border: solid;
        }

        .pages:hover {
            background-color: #bdbdbd;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-2">

        <div class="row g-0" style="box-shadow:  0 2px 2px 2px rgb(104, 108, 109);">
            <nav class="col-2 bg-light">

                <h1 class="h4  text-center">
                    <a class="navbar-brand h1" href="../dashboard.php">
                        <img src="../img/glass-brand.png" width="80px" alt=""></a>
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
                            <a href="../customer/index.php" class="list-group-item p-5"> <i class="fas fa-users"></i>
                                <span class="d-none d-lg-inline">Customers</span>
                            </a>
                        </li>
                        <li>
                            <a href="../invoices/index.php" class="list-group-item p-5"> <i class="fas fa-users"></i>
                                <span class="d-none d-lg-inline">Invoices</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a class=" list-group-item px-5 p-5 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-chart-line"></i>

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
                        </li> -->
                        <li>
                            <a href="../delivery/index.php" class="list-group-item p-5"> <i class="fas fa-truck"></i>
                                <span class="d-none d-lg-inline">Delivery</span>
                            </a>
                        </li>
                        <li>
                            <a href="../retran/index.php" class="list-group-item p-5"> <i class="fas fa-reply"></i>
                                <span class="d-none d-lg-inline">Re/Trans</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="list-group-item p-5 action active"> <i class="fab fa-product-hunt"></i>
                                <span class="d-none d-lg-inline">Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="../cargo/index.php" class="list-group-item p-5"> <i class="fas fa-cart-arrow-down"></i>
                                <span class="d-none d-lg-inline">Cargo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-10 text-white bg-dark">
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
                                    <a href="../logout.php" class="dropdown-item">Logout</a>
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
                                    </h3> <span class="text-danger">
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
                                    </h3>
                                    <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Total invoices
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">50k +</h3> <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Total cashed In
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">20k +</h3> <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Mobile Banking
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3 class="card-title h2">1k +</h3> <span class="text-danger">
                                        <i class="fas fa-chart-line"></i>
                                        Receivables
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" id="list">

                        <h2 class="h6 text-white-50">DATA</h2>
                        <div class="card mb-3" style="height:700px">
                            <div class="card-body">
                                <div class="text-end">
                                    <a href="create.php" class="btn btn-primary float-end">Add Products</a>
                                    <!-- <button class="btn btn-smbtn-outline-secondary"> <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-sort-amount-up"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-filter"></i> </button> -->
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item Name</th>
                                            <th>Date</th>
                                            <th>Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $query = "SELECT * FROM customers";
                                        // $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_runn) > 0) {
                                            foreach ($query_runn as $product) {
                                                //eho
                                        ?>
                                                <tr>
                                                    <td><?= $product['item_id']; ?></td>
                                                    <td><?= $product['item_name']; ?></td>
                                                    <td><?= $product['date']; ?></td>
                                                    <td><?= $product['rate']; ?></td>
                                                    <td>
                                                        <!-- <a href="edit.php?id=<?= $customer['cus_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                         <a href="detail.php?id=<?= $customer['cus_id']; ?>" class="btn btn-primary btn-sm">Details</a>  -->
                                                        <form action="update.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete_product" value="<?= $product['item_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<h5> No Record Found </h5>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="contiainer text-end">
                                    <?php
                                    $pr_query = "SELECT * FROM products";
                                    $pr_result = mysqli_query($con, $pr_query);
                                    $totalrecord = mysqli_num_rows($pr_result);
                                    $totalpages = ceil($totalrecord / $num_per_page);
                                    // echo $totalpages;

                                    for ($i = 1; $i <= $totalpages; $i++) {
                                        echo "<a href='index.php?page=" . $i . "' class='btn pages'>$i</a>";
                                    }
                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
        <footer class="text-center py-4 text-muted"> &copy; Copyright 2020
        </footer>
    </div>
    </div>

</body>

</html>