 <?php

include "dbcon.php";

if(isset($_POST['save_invoice'])){
        $invo_no=$_POST['invo_no'];
        $datetime=date('Y-m-d',strtotime($_POST['datetime']));
        $name=$_POST['cus_id'];
        $amount=$_POST['total'];



        $sql= "INSERT INTO invoices(invoice_no,date,cus_id,amount) VALUES ('$invo_no','$datetime','$name','$amount')";
        
        $result=mysqli_query($con,$sql);

        if($result)
            {
                $_SESSION['message']="Customer Created Successfully";
                header("Location: invoices.php");
                exit(0);
            }
            else
            {
                $_SESSION['message']="Customer Not Created";
                header("Location: invoices.php");
                exit(0);
            }

}
if(isset($_POST['delete_invoice']))
{
    $inv_id = mysqli_real_escape_string($con, $_POST['delete_invoice']);

    $query= "DELETE FROM invoices WHERE id='$inv_id' ";
    $query_run= mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message']="Invoices Deleted Successfully";
        header("Location: invoices.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="Invoices Not Deleted";
        header("Location: invoices.php");
        exit(0);
    }
}



?>