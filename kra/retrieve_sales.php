<!DOCTYPE html>
<html>
<head>
	<title>KRA RETRIEVE SALES</title>
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
			include('../config/database.php');
			$user_id=$_SESSION['id'];
		?>
<!--create  a header for profits using grid-->
<div class="card">
		<div class="container" id="contain">
		  <div class="row">
		    <div class="col-sm-3">    
				<?php
				/*number of purchases made*/
				$purchases1="select distinct `s`.`name` AS `supplier_name`,`s`.`pin` AS `kra`,`s`.`supplier_id` AS `supplier_id`,p.id as purId,SUM(p.vat) AS total,`p`.`receipt_number`AS `receipt_number`,`p`.`name` AS `product`,p.STATUS,`p`.`total_price` AS `taxable_income`,`p`.`date` AS 
                    `date`,`p`.`description` AS `description` from `purchases` `p` join `product_suppliers` `s`
                    on `p`.`supplier_id` = `s`.`supplier_id` WHERE p.supplier_id=$user_id AND p.STATUS='declared'";
				$result1=mysqli_query($conn,$purchases1);
				$row1=mysqli_fetch_assoc($result1);
				$sum=round($row1['total'],2);
				echo "VAT purchases:"." ".$sum;
				?>
		    </div>
		    <div class="col-sm-3">
							 <?php
							/*number of sales made*/
							$sales1="SELECT c.name as customer_name,c.pin,s.id,s.product_name,s.receipt_id,s.sub_total,SUM(s.vat) AS VAT
							FROM sales s JOIN customers c ON s.customer_id=c.user_id WHERE s.supplier_id='$user_id' AND s.STATUS='declared'";
							$result2=mysqli_query($conn,$sales1);
							$row2=mysqli_fetch_assoc($result2);
							$sum1=round($row2['VAT'], 2);
							echo "VAT sales:"." ".$sum1;
							?>
		    </div>
		    <div class="col-sm-6">
		    	<!--calculating profits-->
					<?php
					      $Amount_to_pay=$sum1-$sum;
					      echo "KRA charge:"." ".$Amount_to_pay;
					 ?>
		    </div>
		  </div>
		</div>
	</div>
<!--php code for the modal body-->
				<?php
				$_SESSION['id']=$user_id;
				$sql="SELECT c.name as customer_name,c.pin,s.id,s.product_name,s.receipt_id,s.sub_total,s.vat
				FROM sales s JOIN customers c ON s.customer_id=c.user_id WHERE s.supplier_id=$user_id AND s.STATUS='declared'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					echo "<table class='table table-responsive'>";
					echo "<thead>";
					echo "<tr>";
					// echo "<th>id</th>";
					echo "<th>customer_name</th>";
					// echo "<th>pin</th>";
					echo "<th>product</th>";
					echo "<th>sub_total</th>";
					echo "<th>vat</th>";
					echo "<th>receipt_id</th>";
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
				        echo '<td><form method="POST" action="delete.php">
				             <button name="update" id="update" onclick="check()" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
				             <input  type="hidden" name="sales" id="sales" value="'.$row["id"].'">
				        	  </form>
				             </td>';
				        echo '</tr>';
				    }}
				      echo "</table>";?>

</body>
</html>

