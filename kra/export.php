	<?php
	session_start();
	include_once("../config/database.php");
	$user=$_SESSION['id'];
if (isset($_POST['export'])) { 
	 // $conn=mysqli_connect("localhost","root","","food");
	 header('Content-Type:text/csv;charset=utf-8');
	 header('Content-Disposition:attachment;filename=data.csv');
	 $foutput = fopen("php://output", "w+");//php file pointer
	 //send the column headers
	 fputcsv($foutput,array('Supplier_Name','Supplier_pin','product','invoice Date','invoice No','description','Taxable value','vat'));
	
//sql query statement
	$sql="select `s`.`name` AS `supplier_name`,`s`.`pin` AS `kra`,`p`.`name` AS `product`,`p`.`date` AS `date`,`p`.`receipt_number`AS `receipt_number`,`p`.`description` AS `description`,`p`.`total_price` AS `taxable_income`,p.vat AS VAT from `purchases` `p` join `product_suppliers` `s` on `p`.`supplier_id` = `s`.`supplier_id` WHERE p.supplier_id=$user AND p.STATUS='declared'";
	$result=mysqli_query($conn,$sql);
						while ($row=mysqli_fetch_assoc($result)) {
							fputcsv($foutput,$row);
						}
                            fclose($foutput);              
}
/*'id'='$user' AND */ 
/* sales csv save*/
if (isset($_POST['sales'])) {
	header('Content-Type:text/csv;charset=utf-8');
	header('Content-Disposition:attachment;filename=salesreceipts.csv');
	$output=fopen("php://output", "w+");
	fputcsv($output,array('customer_Id','customer_name','product','sub_total','vat','receipt_number','receipt_date','ETR'));
	$query="SELECT c.name as customer_name,c.pin,s.id,s.product_name,s.receipt_id,s.sub_total,SUM(s.vat) AS VAT
							FROM sales s JOIN customers c ON s.customer_id=c.user_id WHERE s.supplier_id='$user' AND s.STATUS='declared'";
	$result1=mysqli_query($conn,$query);
				while ($data=mysqli_fetch_assoc($result1)) {
					fputcsv($output, $data);
								}	
}
fclose($output);
?>


