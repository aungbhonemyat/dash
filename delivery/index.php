<?php
session_start();
require '../dbcon.php';

// $jquery =mysqli_query($con,"SELECT invoices.*,customer.name FROM customers LEFT JOIN invoices ON invoices.cus_id=customers.cus_id");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_POST['updateStatus'])) {
    $invoiceId = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['updateStatus']);
    $updateStatusQuery = "UPDATE delivery SET stat='$status' WHERE id='$invoiceId'";
    mysqli_query($con, $updateStatusQuery);
}

$deliveryQuery = "SELECT delivery.*, customers.name as name, invoices.status as 'status' FROM delivery,customers,invoices WHERE delivery.cus_id=customers.cus_id AND delivery.invoice_no = invoices.invoice_no";
$relt = mysqli_query($con,$deliveryQuery);

$num_per_page = 9;
$start_from = ($page - 1) * 12;

$qquery = "SELECT invoices.*,customers.name FROM invoices LEFT JOIN customers ON invoices.cus_id=customers.cus_id limit $start_from,$num_per_page";
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
    <title>Retransfer</title>
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
                            <a href="../invoices/index.php" class="list-group-item p-5"> <i class="fa-solid fa-file-invoice-dollar"></i>
                                <span class="d-none d-lg-inline">Invoices</span>
                            </a>
                        </li>
                        <li>
                            <a href="/index.php" class="list-group-item p-5 action active"> <i class="fas fa-truck"></i>
                                <span class="d-none d-lg-inline">Delivery</span>
                            </a>
                        </li>
                        <li>
                            <a href="../retran/index.php" class="list-group-item p-5"> <i class="fas fa-reply"></i>
                                <span class="d-none d-lg-inline">Re/Trans</span>
                            </a>
                        </li>
                        <li>
                            <a href="../products/index.php" class="list-group-item p-5"> <i class="fab fa-product-hunt"></i>
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
                                        $dash_invoice_query = "SELECT * FROM invoices";
                                        $dash_invoice_query_run = mysqli_query($con, $dash_invoice_query);

                                        if ($invoice_total = mysqli_num_rows($dash_invoice_query_run)) {
                                            echo '<h2 class="mb-0 text-center">' . $invoice_total . '</h2>';
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

                    <div class="col" id="list">

                        <h2 class="h2 p-3 text-center text-white-50">Delivery</h2>
                        <div class="card mb-3" style="height:700px">
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs p-3" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>
                                        <button class="nav-link text-success" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">delivered</button>
                                        <button class="nav-link text-primary" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cargo</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                   
            <div class="tab-pane fade show active text-black" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice No</th>
                            <th>Customer Name</th>
                            <th>paid/un</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $query = "SELECT * FROM customers";
                        // $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_runn) > 0) {
                            foreach ($relt as $data) {
                                //eho
                                if ($data['stat'] === 'Cargo') $disabled = 'Cargo';
                                if ($data['stat'] === 'Delivered') $disabled = 'Delivered';
                        ?>
                                <tr>
                                    <td><?= $data['id']; ?></td>
                                    <td><?= $data['invoice_no']; ?></td>
                                    <td><?= $data['name']; ?></td>
                                    <td><?= $data['status']?></td>
                                    <td><?= $data['stat']; ?></td>


                                    <td>
                                        <!-- copy this one for all tabs nor -->
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>" readonly />
                                            <input type="hidden" name="updateStatus" value="Cargo" readonly />
                                            <input type="submit" value="Cargo" <?php if ($disabled === "Cargo") echo " disabled "; ?> class="btn btn-primary btn-sm" />
                                        </form>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>" readonly />
                                            <input type="hidden" name="updateStatus" value="Delivered" readonly />
                                            <input type="submit" value="Delivered" <?php if ($disabled === "Delivered") echo " disabled "; ?> class="btn btn-success btn-sm" />
                                        </form>
                                        <form action="update.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_deli" value="<?= $data['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <!-- <a href="print.php?id=<?= $invoices['id'] ?>" class="btn btn-warning btn-sm">Print</a> -->

                                        <!-- <form method="POST" class="d-inline">
                                            <input type="hidden" name="deliver" value="<?= $invoices['id'] ?>" readonly />
                                            <input type="hidden" name="cus_id" value="<?= $invoices['cus_id'] ?>" readonly />
                                            <input type="submit" value="Deliver" class="btn btn-primary btn-sm" />
                                        </form> -->
                                        <!-- <form action="print.php" method="POST" class="d-inline">
                                    <button type="submit" name="print_inv" value="<?= $invoices['id']; ?>" class="btn btn-warning btn-sm">Print</button>
                                </form> -->
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
            </div>
            <div class="tab-pane fade text-black" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Invoice No</th>
                                                <th>Customer Name</th>
                                                <th>paid/un</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $query = "SELECT * FROM customers";
                                            // $query_run = mysqli_query($con, $query);

                                            if (mysqli_num_rows($query_runn) > 0) {
                                                foreach ($relt as $data) {
                                                    //eho
                                                    if ($data['stat'] === 'Delivered'){
                                            ?>
                                                    <tr>
                                                        <td><?= $data['id']; ?></td>
                                                        <td><?= $data['invoice_no']; ?></td>
                                                        <td><?= $data['name']; ?></td>
                                                        <td><?= $data['status']?></td>
                                                        <td><?= $data['stat']; ?></td>


                                        <td>
                                            <form method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>" readonly />
                                                <input type="hidden" name="updateStatus" value="Cargo" readonly />
                                                <input type="submit" value="Cargo" class="btn btn-primary btn-sm" />
                                            </form>
                                            <form action="update.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_deli" value="<?= $data['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                        <?php
                                }
                            }
                        }
                         else {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade text-black" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <table class="table">                         
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Invoice No</th>
                                                <th>Customer Name</th>
                                                <th>paid/un</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $query = "SELECT * FROM customers";
                                            // $query_run = mysqli_query($con, $query);

                                            if (mysqli_num_rows($query_runn) > 0) {
                                                foreach ($relt as $data) {
                                                    //eho
                                                    if ($data['stat'] === 'Cargo'){
                                            ?>
                                                    <tr>
                                                        <td><?= $data['id']; ?></td>
                                                        <td><?= $data['invoice_no']; ?></td>
                                                        <td><?= $data['name']; ?></td>
                                                        <td><?= $data['status']?></td>
                                                        <td><?= $data['stat']; ?></td>


                                        <td>
                                            <form method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?= $data['id'] ?>" readonly />
                                                <input type="hidden" name="updateStatus" value="Delivered" readonly />
                                                <input type="submit" value="Delivered" class="btn btn-success btn-sm" />
                                            </form>
                                            <form action="update.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_deli" value="<?= $data['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                        <?php
                                }
                            }
                        }
                         else {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
                                </div>

                            </div>

                            <div class="contiainer text-end p-5">
                                <?php
                                $pr_query = "SELECT * FROM delivery";
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
    </div>
    </main>
    <footer class="text-center py-4 text-muted"> &copy; Copyright 2020
    </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>