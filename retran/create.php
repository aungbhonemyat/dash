<?php
require '../dbcon.php';
//save
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="../img/glass-white.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/glass-white.png">
    <title>Retran-create</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/jquery-3.1.1.min.js"></script>


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
                                <!-- <span class="d-none d-lg-inline badge bg-danger
                        rounded-pill float-end">20</span> -->
                            </a>
                        </li>
                        <li>
                            <a href="../invoices/index.php" class="list-group-item p-5 action active"> <i class="fa-solid fa-file-invoice-dollar"></i>
                                <span class="d-none d-lg-inline">Invoices</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a class=" list-group-item px-5 p-5 sidebar-link action active" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-chart-line"></i>

                                <span class="d-none d-lg-inline">Invoices</span><i class="fas fa-sort-down p-2"></i>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <a href="index.php" class="list-group-item">
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
                            <a href="index.php" class="list-group-item p-5"> <i class="fas fa-reply"></i>
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


                    <div class="col">

                        <h2 class="h2 p-3 text-center text-white-50">Add Retransfer List</h2>
                        <div class="card mb-3" style="height:650px">
                            <div class="card-body">
                                <div class="text-end">
                                    <h3 class="float-end text-black"> Add Invoices</h3>
                                </div>

                                <div class="container mt-5">
                                    <?php require('../message.php'); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card text-black">
                                                <div class="card-header">
                                                    <h4>Retran Create
                                                        <a href="index.php" class="btn btn-secondary float-end text-white ">Back</a>
                                                    </h4>
                                                </div>
                                                <div class="card-body ">
                                                    <form action="update.php" method="POST" id="create-invoice-form">
                                                        <div class="mb-3">
                                                            <label>Customer Name</label>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label>Invoice No</label>
                                                            <input type="text" name="invoice_no" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label>Date</label>
                                                            <input type="date" name="date" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label>Total Amount</label>
                                                            <input type="text" name="amount" class="form-control">
                                                        </div>
                                                        <div class="row col-lg-12">
                                                            <div class="col-lg-3">
                                                                <button type="submit" name="save_retran" value="save_retran" class="btn btn-primary">Create Retran</button>
                                                            </div>

                                                        </div>
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
<!-- <script>
    const qtyInput = document.querySelector('input[name="qty[]"]')
    const rateInput = document.querySelector('input[name="rate[]"]')
    const amountInput = document.querySelector('input[name="amount[]"]');

    qtyInput.addEventListener("change", (e) => {
        if (!!rateInput.value) amountInput.value = rateInput.value * qtyInput.value;
    });

    rateInput.addEventListener("change", (e) => {
        if (!!qtyInput.value) amountInput.value = rateInput.value * qtyInput.value;
    });

    const products = [];

    <?php
    $products_query = "SELECT * FROM products";
    $products_relt = mysqli_query($con, $products_query);
    while ($row = mysqli_fetch_assoc($products_relt)) {
        echo "products.push({ id: " . $row['item_id'] . ", rate: " . $row['rate'] . " });";
    }
    ?>

    document.querySelector('select[name="product_id"]').addEventListener('change', (e) => {
        rateInput.value = products.find(p => (p.id == e.target.value)).rate;
    });



    document.querySelector("#add").addEventListener("click", () => {
        if (!!qtyInput.value && !!rateInput.value && !!amountInput.value) {
            // create new row
            let productSelection = document.querySelector('select[name="product_id"]');
            const newRow = document.createElement("tr");
            const itemCol = document.createElement("td");
            const qtyCol = document.createElement("td");
            const rateCol = document.createElement("td");
            const amountCol = document.createElement("td");

            let selectedProduct = productSelection.options[productSelection.selectedIndex];

            // set value into columns
            itemCol.innerHTML = selectedProduct.text;
            qtyCol.innerHTML = qtyInput.value;
            rateCol.innerHTML = rateInput.value;
            amountCol.innerHTML = amountInput.value;
            amountCol.setAttribute("name", "product-amount[]");
            amountCol.colspan = 2;

            // add column into row
            newRow.appendChild(itemCol);
            newRow.appendChild(qtyCol);
            newRow.appendChild(rateCol);
            newRow.appendChild(amountCol);

            // add item to item list
            const items = document.querySelector("#items");
            if (!items.value) {
                items.value = JSON.stringify([{
                    id: parseInt(selectedProduct.value),
                    qty: parseInt(qtyInput.value)
                }])
            } else {
                const itemsArray = JSON.parse(items.value);
                itemsArray.push({
                    id: parseInt(selectedProduct.value),
                    qty: parseInt(qtyInput.value)
                });
                items.value = JSON.stringify(itemsArray);
            }
            //save lite
            // add row to table
            document.querySelector("#table_field").appendChild(newRow);

            const subtotal = document.querySelector("#subtotal");
            const total = document.querySelector("#total");

            const tempSubTotal = !!subtotal.value ? parseInt(subtotal.value) + parseInt(amountInput.value) : amountInput.value;

            subtotal.value = tempSubTotal;

            //d narr lay mharr nay tr, ae hr ko 1 chat line por shar pee lode kyi
            total.value = (!!document.querySelector("#disc").value) ?
                parseInt(subtotal.value) - parseInt(document.querySelector("#disc").value) :
                tempSubTotal;

            // save reload, ya p lol, s and r
        }
    });

    document.querySelector("#disc").addEventListener("change", (e) => {
        const subtotal = document.querySelector("#subtotal");
        const total = document.querySelector("#total");
        if (!!e.target.value && !!subtotal.value) total.value = subtotal.value - e.target.value;
    })
</script> -->

</html>