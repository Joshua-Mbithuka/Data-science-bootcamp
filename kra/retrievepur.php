<!DOCTYPE html>
<html>
<head>
    <title>KRA READ PURCHASES</title>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
    #contain
            {
                height:5em;
                background:#e6e6ff;
                padding:25px ; 

            }
</style>
<body>
    <?php
session_start();
require_once "../init.php";
include "../config/database.php";
// require_once("../config/database.php");
$user=$_SESSION['id'];
$state="ALTER TABLE purchases  ADD STATUS VARCHAR(30) DEFAULT 'declared' ";
$result=mysqli_query($conn,$state);
/*counting the total purchases made by a user*/
$query="SELECT * FROM master_data WHERE supplier_id=$user";
$stat=mysqli_query($conn,$query);?>

<!--create  a header for profits using grid-->
        <div class="container" id="contain">
          <div class="row">
            <div class="col-sm">    
                <?php
                /*number of purchases made*/
                $purchases1="select distinct `s`.`name` AS `supplier_name`,`s`.`pin` AS `kra`,`s`.`supplier_id` AS `supplier_id`,p.id as purId,SUM(p.vat) AS total,`p`.`receipt_number`AS `receipt_number`,`p`.`name` AS `product`,p.STATUS,`p`.`total_price` AS `taxable_income`,`p`.`date` AS 
                    `date`,`p`.`description` AS `description` from `purchases` `p` join `product_suppliers` `s`
                    on `p`.`supplier_id` = `s`.`supplier_id` WHERE p.supplier_id=$user AND p.STATUS='declared'";
                $result1=mysqli_query($conn,$purchases1);
                $row1=mysqli_fetch_assoc($result1);
                $sum=round($row1['total'],2);
                echo "VAT purchases:"." ".$sum;
                ?>
            </div>
            <div class="col-sm">
                             <?php
                            /*number of sales made*/
                            /*number of sales made*/
                            $sales1="SELECT c.name as customer_name,c.pin,s.id,s.product_name,s.receipt_id,s.sub_total,SUM(s.vat) AS VAT
                            FROM sales s JOIN customers c ON s.customer_id=c.user_id WHERE s.supplier_id='$user_id' AND s.STATUS='declared'";
                            $result2=mysqli_query($conn,$sales1);
                            $row2=mysqli_fetch_assoc($result2);
                            $sum1=round($row2['VAT'], 2);
                            echo "VAT sales:"." ".$sum1;
                            ?>
            </div>
            <div class="col-sm">
                <!--calculating profits-->
                    <?php
                          $Amount_to_pay=$sum1-$sum;
                          echo "KRA charge :"." ".$Amount_to_pay;
                     ?>
            </div>
          </div>
        </div>




<br><?php
/*creating a join*/
$sql = "select distinct `s`.`name` AS `supplier_name`,`s`.`pin` AS `kra`,`s`.`supplier_id` AS `supplier_id`,p.id as purId,p.vat AS VAT,`p`.`receipt_number`
AS `receipt_number`,`p`.`name` AS `product`,p.STATUS,`p`.`total_price` AS `taxable_income`,`p`.`date` AS 
`date`,`p`.`description` AS `description` from `purchases` `p` join `product_suppliers` `s`
on `p`.`supplier_id` = `s`.`supplier_id` WHERE p.supplier_id=$user AND p.STATUS='declared'";
                                        //$sql="SELECT * FROM master_data WHERE supplier_id=$user AND STATUS='declared'";
$result=mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0) { 
                        echo "<table class='table table-responsive'>";
                        echo "<thead>"; 
                        echo'<tr>';
                        // echo "<th>Supplier_Name</th>";
                        // echo "<th>Supplier_pin</th>";
                        echo "<th>product</th>";
                        // echo "<th>Invoice Date</th>";
                        echo "<th>invoice No</th>";
                        // echo "<th>description</th>";
                        echo "<th>Taxable value</th>";
                        echo "<th>vat</th>";
                        echo "<th>action</th>";
                        echo '</tr>' ;
                        echo("</thead>");
                        while ($row=mysqli_fetch_assoc($result)) {
                            //print_r($row);//prints the contents of ana array
                            //var_dump($row);
                            //echo implode('', $row);
                            //echo json_encode($row);

                        echo "<tr>";
                        // echo "<td>".$row["supplier_name"]."</td>";
                        // echo "<td>".$row["kra"]."</td>";
                        echo "<td>".$row["product"]."</td>";
                        // echo "<td>".$row["date"]."</td>";
                        echo "<td>".$row["receipt_number"]."</td>";
                        // echo "<td>".$row["description"]."</td>";
                        echo "<td>".$row["taxable_income"]."</td>";
                        echo "<td>".$row["VAT"]."</td>";
                        echo '<td><form method="POST" action="delete.php">
                             <button name="removebtn" id="removebtn" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button><input  type="hidden" name="delid" id="delid" value="'.$row["purId"].'">
                             </form>
                             </td>'; 

                        echo "</tr>";
    }}
                        echo "</table>";
        ?>
        <script>
            $(document).ready(function()
            {
                
                $("#removebtn").click(function(e){
                    x=confirm("these item will be removed from the list");
                    if (x) {
                        return true;
                    } 
                    else
                    {
                        return false;
                    }
                })              
            })
        </script>


</body>
</html>


