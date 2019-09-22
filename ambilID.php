<?php 
	include 'koneksi.php';

	$id= $_POST['id'];
	$query="SELECT * FROM databuku WHERE id=".$id;
	$queryResult = mysqli_query($connect,$query);
	$result=array();

	$fetchData=$queryResult->fetch_assoc();
	$result=$fetchData;
	
	echo json_encode($result);
 ?>