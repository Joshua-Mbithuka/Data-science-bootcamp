	<?php
if (isset($_POST['export'])) { 
	$conn=mysqli_connect("localhost","root","","food");
	//$conn = mysqli_connect($host, $username, $password, $database);
	header('Content-Type:text/csv;charset=utf-8');
	header('Content-Disposition:attachment;filename=data.csv');
	$foutput = fopen("php://output", "w");
	fputcsv($foutput,array('CUSTOMERID','PRODUCT NAME','SUBTOTAL_PRICE','VAT','TOTAL_PRICE'));
	$sql="SELECT id,name,sub_total,vat,total_price FROM purchases WHERE 'id'='$user' AND STATUS='declared'";
	$result=mysqli_query($conn,$sql);
						while ($row=mysqli_fetch_assoc($result)) {
							fputcsv($foutput,$row);
						}
                            fclose($foutput);              
}

?>

