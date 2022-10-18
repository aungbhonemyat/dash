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

$qquery = "SELECT customers.cus_id,customers.name,customers.phone, SUM(invoices.amount) as receive, SUM(invoices.disc) as disc FROM customers, invoices WHERE customers.cus_id = invoices.cus_id GROUP BY customers.cus_id LIMIT $start_from,$num_per_page";

$query_runn = mysqli_query($con, $qquery);

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
                                    </h3><span class="text-success">
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

                    <!-- <div class="row mt-4 flex-column flex-lg-row"> -->
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
                    <div class="col" id="list">

                        <h2 class="h6 text-white-50">DATA</h2>
                        <div class="card mb-3" style="height:700px">
                            <div class="card-body">
                                <div class="text-end">
                                    <a href="create.php" class="btn btn-primary float-end">Add Customer</a>
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Receivables</th>
                                            <th>Discount</th>
                                            <th>Phone No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $query = "SELECT * FROM customers";
                                        // $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_runn) > 0) {
                                            foreach ($query_runn as $customer) {

                                        ?>
                                                <tr>
                                                    <td><?= $customer['cus_id']; ?></td>
                                                    <td><?= $customer['name']; ?></td>
                                                    <td><?= $customer['receive']; ?></td>
                                                    <td><?= $customer['disc']; ?></td>
                                                    <td><?= $customer['phone']; ?></td>
                                                    <td>
                                                        <a href="edit.php?id=<?= $customer['cus_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                        <a href="detail.php?id=<?= $customer['cus_id']; ?>" class="btn btn-primary btn-sm">Details</a>
                                                        <form action="code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete_customer" value="<?= $customer['cus_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
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
                                    $pr_query = "SELECT * FROM customers";
                                    $pr_result = mysqli_query($con, $pr_query);
                                    $totalrecord = mysqli_num_rows($pr_result);
                                    $totalpages = ceil($totalrecord / $num_per_page);
                                    // echo $totalpages;

                                    for ($i = 1; $i <= $totalpages; $i++) {
                                        echo "<a href='customer.php?page=" . $i . "' class='btn pages'>$i</a>";
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