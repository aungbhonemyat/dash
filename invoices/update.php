 <?php

    require "../dbcon.php";
    session_start();

    if (isset($_POST['save_invoice']))
    // echo "dbsuccess"; save
    {
        $invo_no = mysqli_real_escape_string($con, $_POST['invo_no']);
        $datetime = date('Y-m-d', strtotime($_POST['datetime']));
        $name = mysqli_real_escape_string($con, $_POST['cus_id']);
        $amount = mysqli_real_escape_string($con, $_POST['total']);
        $disc = mysqli_real_escape_string($con, $_POST['disc']);
        $products = mysqli_real_escape_string($con, $_POST['products']);


        $sql = "INSERT INTO invoices(invoice_no,date,cus_id,amount,disc,status,products) VALUES ('$invo_no','$datetime','$name',$amount,$disc,'UNPAID','$products')";

        // echo $sql;

        $result = mysqli_query($con, $sql);

        echo $result;

        if ($result) {
            $_SESSION['message'] = "Customer Created Successfully";
            header("Location: invoices/index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Customer Not Created";
            header("Location: invoices/index.php");
            exit(0);
        }
    }
    if (isset($_POST['delete_invoice'])) {
        $inv_id = mysqli_real_escape_string($con, $_POST['delete_invoice']);

        $query = "DELETE FROM invoices WHERE id='$inv_id' ";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "Invoices Deleted Successfully";
            header("Location: invoices/index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Invoices Not Deleted";
            header("Location: invoices/index.php");
            exit(0);
        }
    }

    ?>