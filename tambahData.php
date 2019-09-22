<?php 
	include 'koneksi.php';

	$namaBuku= $_POST['namaBuku'];
	$pengarang= $_POST['pengarang'];
	$tahunTerbit= $_POST['tahunTerbit'];

	$result['pesan']="";

	if ($namaBuku=="") {
		$result['pesan']="judul diisi";
	} else if ($pengarang=="") {
		$result['pesan']="pengarang diisi";
	} else if ($tahunTerbit=="") {
		$result['pesan']="tahun diisi";
	} else {
		$query="INSERT INTO databuku (namaBuku, pengarang, tahunTerbit) VALUES ('".$namaBuku."','".$pengarang."','".$tahunTerbit."')";
		$queryResult = mysqli_query($connect,$query);
		if ($queryResult) {
			$result['pesan']="data berhasil ditambah";
		}else{
			$result['pesan']="data gagal ditambah";
		}
	}
	echo json_encode($result);

 ?>