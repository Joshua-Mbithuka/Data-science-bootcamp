<!--the purchases button-->
<?php
include_once("../config/database.php");
if(isset($_POST['removebtn'])){
        $delid=$_POST['delid'];
        $sql="UPDATE purchases SET STATUS='undeclared' WHERE id=$delid";
        $result=mysqli_query($conn,$sql);
        printf("Affected rows (sql): %d\n", mysqli_affected_rows($conn));
        header('location:index.php');
        }
// the sales button 
if(isset($_POST['update'])){
	$update=$_POST['sales'];
	$sales="UPDATE sales SET STATUS='undeclared' WHERE id=$update";
	$result=mysqli_query($conn,$sales);
	printf("Affected rows (sql): %d\n", mysqli_affected_rows($conn));
	header('location:index.php');
}

// <!--add sale-->
if(isset($_POST['reset1'])){
	$reset1=$_POST['reset'];
	$sales="UPDATE sales SET STATUS='declared' WHERE id=$reset1";
	$result=mysqli_query($conn,$sales);
	printf("Affected rows (sql): %d\n", mysqli_affected_rows($conn));
	header('location:index.php');
}
if(isset($_POST['addpurchase'])){
	$add=$_POST['addpur'];
	$purchase="UPDATE purchases SET STATUS='declared' WHERE id=$add";
	$result4=mysqli_query($conn,$purchase);
	header('location:index.php');
}

?>