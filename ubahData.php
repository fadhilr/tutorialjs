<?php 
	include 'koneksi.php';

	$id= $_POST['id'];
	$namaBuku= $_POST['namaBuku'];
	$pengarang= $_POST['pengarang'];
	$tahunTerbit= $_POST['tahunTerbit'];
	$result=array();


	$query="UPDATE databuku SET namaBuku='".$namaBuku."', pengarang='".$pengarang."', tahunTerbit='".$tahunTerbit."' WHERE id='".$id."'";
	$queryResult= mysqli_query($connect,$query);
	$fetchData= $queryResult->fetch_assoc();
	$result[]=$fetchData;
	echo json_encode($result);

 ?>