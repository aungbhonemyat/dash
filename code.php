<?php
session_start();
require "dbcon.php";


// if(isset($_POST['delete_product']))
// {
//     $product_id = mysqli_real_escape_string($con, $_POST['delete_product']);

//     // UPDATE invoice SET status = 'PAID' WHERE invoice_id='$product_id';
//     $query= "DELETE FROM products WHERE item_id='$product_id' ";
//     $query_run= mysqli_query($con, $query);

//     if($query_run)
//     {
//         $_SESSION['message']="Product Deleted Successfully";
//         header("Location: products.php");
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message']="Product Not Deleted";
//         header("Location: products.php");
//         exit(0);
//     }
// }

// if(isset($_POST['save_product']))
// echo "dbsuccess";
// {
//     $name=mysqli_real_escape_string($con,$_POST['item_name']);
//     $rate=mysqli_real_escape_string($con,$_POST['rate']);
//     $date=date('Y-m-d',strtotime($_POST['date']));

//     $query = "INSERT INTO products (item_name,rate,date) VALUES('$name','$rate','$date')";

//     $query_run = mysqli_query($con,$query);

//     if($query_run)
//     {
//         $_SESSION['message']="Products Created Successfully";
//         header("Location: products.php");
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message']="Products Not Created";
//         header("Location: products.php");
//         exit(0);
//     }
// }


if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query= "DELETE FROM customers WHERE cus_id='$customer_id' ";
    $query_run= mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message']="Customer Deleted Successfully";
        header("Location: customer.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="Customer Not Deleted";
        header("Location: customer.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $customer_id= mysqli_real_escape_string($con, $_POST['customer_id']);

    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $town=mysqli_real_escape_string($con,$_POST['town']);
    $city=mysqli_real_escape_string($con,$_POST['city']);
    // $receive=mysqli_real_escape_string($con,$_POST['receive']);
    // $disc=mysqli_real_escape_string($con,$_POST['disc']);

    $query = "UPDATE customers SET  name='$name', email='$email', phone='$phone',town='$town', city='$city' WHERE cus_id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message']="Customer Updated Successfully";
        header("Location: customer.php");
        exit(0);
    }else{
        $_SESSION['message']="Customer Not Updated";
        header("Location: customer.php");
        exit(0);
    }
}


if(isset($_POST['save_customer']))
// echo "dbsuccess";

{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $town=mysqli_real_escape_string($con,$_POST['town']);
    $city=mysqli_real_escape_string($con,$_POST['city']);
    // $receive=mysqli_real_escape_string($con,$_POST['receive']);

    $query = "INSERT INTO customers(name,email,phone,town,city) VALUES('$name','$email','$phone','$town','$city')";

    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message']="Customer Created Successfully";
        header("Location: customer.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="Customer Not Created";
        header("Location: customer.php");
        exit(0);
    }
}