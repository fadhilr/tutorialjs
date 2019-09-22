<?php  
	include 'koneksi.php';
	$query="SELECT * FROM databuku";
	$queryResult = mysqli_query($connect,$query);
	$result=array();

	while ($fetchData=$queryResult->fetch_assoc()) {
	$result[]=$fetchData;
	}
	echo json_encode($result);
?>