<?php
require '../dbcon.php';

if (isset($_GET['id'])) {
    $invoiceId = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT invoices.*, customers.name FROM invoices, customers WHERE invoices.cus_id = customers.cus_id AND invoices.id = '$invoiceId'";

    //save reload, gogo
    $relt = mysqli_query($con, $query);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" href="../img/glass-white.png">
        <link rel="shortcut icon" type="image/x-icon" href="../img/glass-white.png">
        <title>Glass</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/all.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <!-- <link rel="stylesheet" href="css/print.css" media="print"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="../js/bootstrap.min.js" defer></script>

    </head>

    <body>

        <?php
        if (mysqli_num_rows($relt) > 0) {
            foreach ($relt as $data) {

                $invoice_no = $data['invoice_no'];
        ?>

                <section class="container-fluid" id="invoice">
                    <div class="row">
                        <div class="col-10 mx-auto">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="display-4">INVOICE</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="h1">Glass Business
                                    <p>
                                    <p class="text-muted">Address and Phone</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="text-primary">Customer</p>
                                    <p><?= $data['name'] ?></p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-primary">Date</p>
                                        <p><?= $data['date'] ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-primary">Invoice No.</p>
                                        <p><?= $data['invoice_no'] ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="text-primary">Amount Due</p>
                                        <p><?= $data['amount'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top border-primary" style="border-width: 2px !important;">
                                <div class="col-sm-6">
                                    <p class="text-primary">DESCRIPTION</p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="text-primary">RATE</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-primary">QTY</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="text-primary">AMOUNT</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            //paste
                            $itemsQuery = "SELECT * FROM orders,products WHERE orders.invoice_no='$invoice_no' AND orders.item_id = products.item_id";
                            $itemsRelt = mysqli_query($con, $itemsQuery);
                            if (mysqli_num_rows($itemsRelt) > 0) {
                                foreach ($itemsRelt as $item) {
                            ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= $item['item_name'] ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <?= $item['rate'] ?>
                                                </div>
                                                <div class="col-sm-4">
                                                    <?= $item['qty'] ?>
                                                </div>
                                                <div class="col-sm-4">
                                                    <?php echo $item['qty'] * $item['rate'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No Items";
                            }
                            ?>
                            
                            <div class="row p-3 mt-5">
                                <div class="col-sm-6 offset-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="text-end">Subtotal</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-end"><?= $data['amount'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row border-bottom border-primary" style="border-width: 2px !important;">
                                        <div class="col-sm-6">
                                            <p class="text-end">Discount</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-end"><?= $data['disc'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="text-end">Total</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-end"><?php echo $data['amount'] - $data['disc']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button id="print" class="btn btn-warning me-5">Print</button>
                        </div>
                    </div>
                </section>
                

            <?php
            }
        } else {
            echo "<h5>No Record Found </h5>";
        }
            ?>

    </body>
    <script>
        const button = document.querySelector("#print");
        button.addEventListener("click", () => {
            button.className = "d-none";
            window.print();
        });
        //save reload, gogo, gogo
    </script>

    </html>
<?php
} else {
    echo "Missing invoice id";
}
?>