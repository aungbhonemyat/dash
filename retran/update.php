 <?php

    require "../dbcon.php";
    session_start();

    if (isset($_POST['save_retran']))
    {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $invoice_no = mysqli_real_escape_string($con, $_POST['invoice_no']);
        $date = date('Y-m-d', strtotime($_POST['date']));
        $amount = mysqli_real_escape_string($con, $_POST['amount']);
        // $city = mysqli_real_escape_string($con, $_POST['city']);
        // $receive=mysqli_real_escape_string($con,$_POST['receive']);

        $query = "INSERT INTO transfer (name,invoice_no,date,amount) VALUES('$name','$invoice_no','$date','$amount')";

        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "Retransfer list Created Successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Retransfer list Not Created";
            header("Location: index.php");
            exit(0);
        }
    }


    if (isset($_POST['delete_retran'])) {
        $ret_id = mysqli_real_escape_string($con, $_POST['delete_retran']);

        $query = "DELETE FROM transfer WHERE id='$ret_id' ";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] = "Retransfered list Deleted Successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Retransfered list Not Deleted";
            header("Location: index.php");
            exit(0);
        }
    }

    ?>