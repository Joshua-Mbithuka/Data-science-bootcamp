<?php
require_once "../init.php";
//include "../config/database.php";
require_once("../config/database.php");
$state="ALTER TABLE purchases  ADD STATUS VARCHAR(30) DEFAULT 'declared' ";
$result=mysqli_query($conn,$state);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRA Module</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/ui-kit.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
    <!--            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include '../../templates/header.php' ?>
    <main>
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-1"></div>
                <div class="col-md-10 ">
                    <div class="alert alert-success">Controls/Reports Placed Here</div>
                    <div class="op"></div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <button class="btn btn-outline-info m-auto pl-4 pr-4" id="add-purchase">Add Purchase receipt<i class="pl-2 fa fa-plus"></i></button>
                            <table class="table table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Receipt Code</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-info m-auto pl-4 pr-4" id="add-sale" data-target="#add-sale">Add Sale Receipt<i class="pl-2 fa fa-plus"></i></button>
                            <table class="table table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Receipt Code</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- Row - End -->

        </div>
        <!-- Container-fluid -->
        
         <!-- Add Sales Receipt Modal -->
        <div class="modal fade-in" id="purchase-receipt-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Purchase Receipts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container-fluid">
                       <div class="row p-2">
                            <table class="table table-sm ">
                                <thead>                               
                                    <tr>
                                        <th>Product</th>
                                        <th>Sub Total</th>
                                        <th>VAT</th>
                                        <th>Totalprice</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody id="sales-select">
                                            <?php
                                            if (isset($_SESSION['id'])) {
                                            	       $user=$_SESSION['id'];
                                                        echo($user);
                                                                $conn=mysqli_connect("localhost","root","","food");
                                                                if (!$conn) {
                                                                         echo "connection failed".mysqli_connect_error();
                                                                            }
                                                                $sql="SELECT id,name,sub_total,vat,total_price FROM purchases WHERE 'id'='$user' AND STATUS='declared'";
                                                                $result=mysqli_query($conn,$sql);
                                                                $x=mysqli_num_rows($result);
                                                                echo "Total Purchases Made"." = ".$x;
                                                                if (mysqli_num_rows($result)>0) {   
                                                                                        while ($row=mysqli_fetch_assoc($result)) {
                                                                                        echo "<tr>";
                                                                                        echo "<td>".$row["name"]."</td>";
                                                                                        echo "<td>".$row["sub_total"]."</td>";
                                                                                        echo "<td>".$row["vat"]."</td>";
                                                                                        echo "<td>".$row["total_price"]."</td>";
                                                                                         echo '<td><form method="POST">
                                                                                             <input type="submit" value="Remove" name="removebtn" class="btn btn-outline-info"><input  type="hidden" name="delid" value="'.$row["id"].'">
                                                                                             </form>
                                                                                             </td>';                                                                           
                                                                                echo "</tr>";
                                                                                }
                                                                            }
                                                                            //echo "</table>";
                                                                if(isset($_POST['removebtn'])){
                                                                        $delid=$_POST['delid'];
                                                                        $sql="update purchases set state='undeclared' where id='$delid'";
                                                                        $res=mysqli_query($conn,$sql);
                                                                        echo' <meta http-equiv="refresh" content="1">';}
                                                                        }
                                                                 else
                                                                            {
                                                                                echo "zero results";
                                                                            }
                                            ?>
                                    

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"></td>
                                        <td id="total-edit-sales">
                                        
                                            
                                        </td>
                                    </tr>
                                </tfoot>
                            </table></div>
                    <div class="modal-footer">
                        <div class="mr-3" id="error"></div>
                        <!---adding a button to download the csv data-->
                        <form action="export.php" method="POST">
                                <input type="submit" value="export" name="export" class="btn btn-outline-info">
                        </form>
                        <!--modal close button-->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--
    <div class="container">
  <h2>Modal Example</h2>-->
  <!-- Trigger the modal with a button -->
 <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">addpurchases<i class="pl-2 fa fa-plus"></i></button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    Modal content-->
 
               
          

        <!-- Add Purchase Receipt Modal -->
        <!--<div class="modal fade-in" id="purchase-receipt-modal" tabindex="-1" role="dialog">-->
        <!--    <div class="modal-dialog modal-lg" role="document">-->
        <!--        <div class="modal-content">-->
        <!--            <div class="modal-header">-->
        <!--                <h5 class="modal-title">Add Purchase Receipts</h5>-->
        <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
        <!--                    <span aria-hidden="true">&times;</span>-->
        <!--                </button>-->
        <!--            </div>-->
        <!--            <div class="modal-body container-fluid">-->
        <!--                <div class="row">-->
        <!--                    <form method="POST" enctype="multipart/form-data">-->
        <!--                        <aside class="col-sm-12">-->
        <!--                            <article class="p-5">-->
        <!--                                <dl class="row">-->
        <!--                                    <dt class="col-sm-4">SKU</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <input name="sku" class="form-control" type="text" placeholder="354346343" id="sku">-->
        <!--                                    </dd>-->

        <!--                                    <dt class="col-sm-4">Receipt ID</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <input name="receipt_id" class="form-control" type="text" placeholder="3543" id="receipt_id">-->
        <!--                                    </dd>-->

        <!--                                    <dt class="col-sm-4">Name</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <b id="product_name"></b>-->
        <!--                                    </dd>-->

        <!--                                    <dt class="col-sm-4">Unit Price</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <b id="unit_price"></b>-->
        <!--                                    </dd>-->

        <!--                                    <dt class="col-sm-4">Fraction</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <input name="fraction" class="form-control" type="text" placeholder="1/8" id="fraction">-->
        <!--                                    </dd>-->

        <!--                                    <dt class="col-sm-4">Quantity</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <input name="quantity" class="form-control" type="number" placeholder="50" id="quantity">-->
        <!--                                    </dd>-->

        <!--                                    <dt class="col-sm-4">VAT</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <input name="vat" class="form-control" type="text" placeholder="Enter VAT. Leave blank for default 16%" id="vat">-->
        <!--                                    </dd>-->

        <!--                                    <dt class="col-sm-4">Total Price</dt>-->
        <!--                                    <dd class="col-sm-8">-->
        <!--                                        <b id="total_price"></b>-->
        <!--                                    </dd>-->

        <!--                                </dl>-->
        <!--                            </article> <!-- card-body.// -->-->
        <!--                        </aside>-->
        <!--                    </form>-->
        <!--                </div>-->
        <!--            </div>-->

        <!--            <div class="modal-footer">-->
        <!--                <div class="mr-3" id="error"></div>-->
        <!--                <button type="button" id="add-submit" class="btn btn-primary">Save</button>-->
        <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        
        <!-- Add Sales Receipt Modal -->
        <div class="modal fade-in" id="sale-receipt-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Sales Receipts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container-fluid">
                        <div class="row p-2">
                            <table class="table table-sm ">
                                <thead>
                                    <tr>
                                        <th>Receipt Code</th>
                                        <th>Sub Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sales-select">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Total Sales Selected</td>
                                        <td id="total-edit-sales"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="mr-3" id="error"></div>
                        <button type="button" id="add-submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js">
    </script>
    <?php include "../../templates/footer.php" ?>
</body>

</html>