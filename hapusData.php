<?php 
	include 'koneksi.php';
	$id=$_POST['id'];
	$result=array();

	$query= "DELETE FROM databuku WHERE id=".$id;
	$queryResult= mysqli_query($connect, $query);

	$fetchData= $queryResult->fetch_assoc();
	$result[]=$fetchData;
	echo json_encode($result);
 ?>