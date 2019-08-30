<?php
session_start();
require_once "../init.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
        @media screen and (min-width: 768px) {
    
    #myModa.modal-dialog  {width:50px;}

}
    </style>
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRA Module</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="modalstyle.css">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/ui-kit.css">
    <link rel="stylesheet" href="../../public/js/ui-kit.js">
    <link rel="stylesheet" href="../../public/js/uikit.min.js">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--<script src="script.js"></script>-->
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
                            <button class="btn btn-outline-info m-auto pl-4 pr-4" id="add-purchase">add purchases receipts<i class="pl-2 fa fa-plus"></i></button>
                            <table class="table table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>Purchases Made</th>
                                        <!-- <th>Receipt Code</th>
                                        <th>Amount</th> -->
                                    </tr>
                                     
                                </thead>
                            </table>
                        </div>
                         
                        <div class="col-md-6">
                            <button class="btn btn-outline-info m-auto pl-4 pr-4" id="add-sale">add sales receipts<i class="pl-2 fa fa-plus"></i></button>
                            <table class="table table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>SALES</th>
                                        <!-- <th>Receipt Code</th>
                                        <th>Amount</th>-->
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
        <!--undeclared sales-->
                <div class="modal fade-in" id="mymodal" data-keyboard="false" data-backdrop="static"  datatabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View all Sales Receipts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="mmodal-body container-fluid">
                        <div class="row p-2">
                            <table class="table table-sm ">
                                <tr>
                                    
                                </tr>
                                <tbody id="sales-select">
                                    <tr>

                                      
                                    
                                    </tr>

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
                        <div class="mr-3" id="sales-error"></div>
                        <button type="button" id="save" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!--undeclared sales above-->
        <div class="modal fade-in" id="sale-receipt-modal" data-keyboard="false" data-backdrop="static"  datatabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="salecontent">
                    <div class="modal-header" id="saleheader">
                        <h5 class="modal-title">add sales Receipts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="mymodal-body container-fluid">
                        <div class="row p-2">
                            <table class="table table-sm ">
                                <tr>
                                    
                                </tr>
                                <tbody id="sales-select">
                                    <tr>

                                      
                                    
                                    </tr>

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
                    <div class="details text-center">
                   
                           
                    </div>
                                           

                    <div class="modal-footer">
                        <div class="mr-3" id="sales-error"></div>
                        <button type="button" id="save" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

         <!-- Add  purchasesreceipt Modal -->
        <div class="modal fade-in" id="purchase-receipt-modal" tabindex="1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="purchasecontent">
                    <div class="modal-header" id="purchaseheader">
                        <h5 class="modal-title">View Purchase Receipts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body container-fluid">
                       <div class="row p-2">
                            <table class="table table-responsive ">
                                <thead style="width: 500px;"> 
                               
                              
                                    
                                </thead>
                                <tbody id="sales-select">
                                    

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td colspan="4"></td>
                                        <td id="total-edit-sales">
                                           
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mr-3" id="error"></div>
                        <!---adding a button to download the csv data-->
                        <form action="export.php" method="POST">
                                <button class="btn btn-outline-info" id="click" name="export" value="save">save</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
       <!--<script src="script1.js"></script>-->
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
        <!--                            </article> <!- card-body.// -->
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

    

    </main>
    <!--ajax call -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" id="del">

            </div>
            <div class="col-md-6" id="data">

            </div>
        </div>
        <!---the buttons styling-->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <form method="POST" action="export.php">
                    <div class="text-center">
                        <button colspan="2" class="btn btn btn-outline-info" id="save" name="export"> save </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <form action="export.php" method="POST" enctype="">
                    <div class="text-center">
                        <button class="btn btn-outline-info" id="export" colspan="6" name="sales">save</button>
                    </div>
                </form>
            </div>
                
            </div>
        </div>
        
    </div>
    
      <script src="../../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js">
    </script>
    <script src="script1.js"></script>
       <?php include "../../templates/footer.php" ?>
</body>

</html>