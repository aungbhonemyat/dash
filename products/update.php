<?php
session_start();
require "../dbcon.php";


if (isset($_POST['delete_product'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['delete_product']);

    // UPDATE invoice SET status = 'PAID' WHERE invoice_id='$product_id';
    $query = "DELETE FROM products WHERE item_id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Product Deleted Successfully";
        header("Location: products.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Product Not Deleted";
        header("Location: products.php");
        exit(0);
    }
}

if (isset($_POST['save_product']))
    echo "dbsuccess"; {
    $name = mysqli_real_escape_string($con, $_POST['item_name']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $date = date('Y-m-d', strtotime($_POST['date']));

    $query = "INSERT INTO products (item_name,rate,date) VALUES('$name','$rate','$date')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Products Created Successfully";
        header("Location: products.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Products Not Created";
        header("Location: products.php");
        exit(0);
    }
}
