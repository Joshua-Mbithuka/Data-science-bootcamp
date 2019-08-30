<!DOCTYPE html>
<html>
<head>
    <title>add a sales</title>
</head>
<body>
<?php
session_start();
require_once "../init.php";
?>
<div class="details text-center">
                        <?php
                $_SESSION['id']=$user_id;
                $sql="SELECT c.name as customer_name,c.pin,s.id,s.product_name,s.receipt_id,s.sub_total,s.vat,s.STATUS
                FROM sales s JOIN customers c ON s.customer_id=c.user_id WHERE s.supplier_id=$user_id AND s.STATUS='undeclared'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    echo "<table class='table table-responsive table-striped' style=margin-left:0px;>";
                    echo "<thead class=thead-light>";
                    echo "<tr>";
                    // echo "<th>id</th>";
                    echo "<th>customer_name</th>";
                    // echo "<th>pin</th>";
                    echo "<th>product</th>";
                    echo "<th>sub_total</th>";
                    echo "<th>vat</th>";
                    echo "<th>receipt_id</th>";
                    // echo"<th>STATUS</th>";
                    echo"<th>action<th>";
                    echo "</tr>";
                    echo "</thead>";
                    while ($row=mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        // echo '<td>'.$row["id"].'</td>';
                        echo '<td>'.$row["customer_name"].'</td>';
                        // echo '<td>'.$row["pin"].'</td>';
                        echo '<td>'.$row["product_name"].'</td>';
                        echo '<td>'.$row["sub_total"].'</td>';
                        echo '<td>'.$row["vat"].'</td>';
                        echo '<td>'.$row["receipt_id"].'</td>';
                        // echo '<td>'.$row["STATUS"].'</td>';

                        echo '<td><form method="POST" action="delete.php">                         
                             <button name="reset1" id="reset1" class="btn btn-outline-success"><i class="fa fa-plus"></i></button>
                             <input  type="hidden" name="reset" id="reset" value="'.$row["id"].'">
                            
                             </form>
                             </td>';
                        echo '</tr>';
                    }}
                      echo "</table>";?>
                                <script>
                                    $(document).ready(function()
                                    {
                                        $("#removebtn").click(function(e){
                                            x=confirm("these item will be completely deleted from the database");
                                            if (x) {
                                                return true;
                                            } 
                                            else
                                            {
                                                return false;
                                            }
                                            e.preventdefault();
                                            $("#purchase-receipt-modal").modal("show")

                                        })
                                        
                                    })
                                </script>
</body>
</html>
