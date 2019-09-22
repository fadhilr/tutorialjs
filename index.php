<!DOCTYPE html>
<html>
<head>
	<title>
		Tutor JS
	</title>
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<h1>Data Buku</h1>
	<table width="50%">
		<thead>
			<th>no</th>
			<th>nama buku</th>
			<th>pengarang</th>
			<th>tahun terbit</th>
		</thead>
			
		<tbody id="barisData">
			
		</tbody>
	</table>
	<h2>Tambah Data</h2>
	<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="id" disabled></td>
		</tr>
		<tr>
			<td>Nama buku</td>
			<td><input type="text" name="namaBuku"></td>
		</tr>
		<tr>
			<td>pengarang</td>
			<td><input type="text" name="pengarang"></td>
		</tr>
		<tr>
			<td>tahun terbit</td>
			<td><input type="text" name="tahunTerbit"></td>
		</tr>
		<tr>
			<td></td>
			<td><button id="tombolTambah" onclick="tambahData()"> Tambah data</button>
			<button id="tombolUbah" onclick="ubahData()"> Ubah data</button></td>
			
		</tr>
	</table>
	<h4 id="pesan"></h4>
	<script type="text/javascript">
		onload();
		function tambahData(){
			var namaBuku=$("[name='namaBuku']").val();
			var pengarang=$("[name='pengarang']").val();
			var tahunTerbit=$("[name='tahunTerbit']").val();

			$.ajax({
				type:"POST",
				data: "namaBuku="+namaBuku+"&pengarang="+pengarang+"&tahunTerbit="+tahunTerbit,
				url: 'tambahData.php',
				success : function(result){
					var objResult= JSON.parse(result);
					$("#pesan").html(objResult.pesan);
					onload();
				}

			})
		}
		function pilihData(idx){
			var id=idx;
			$.ajax({
				type:"POST",
				data: "id="+id,
				url: 'ambilID.php',
				success : function(result){
					var objResult=JSON.parse(result);
					$("[name='id']").val(objResult.id);
					$("[name='namaBuku']").val(objResult.namaBuku);
					$("[name='pengarang']").val(objResult.pengarang);
					$("[name='tahunTerbit']").val(objResult.tahunTerbit);
					
				}
			})
		}
		function ubahData(){
			var id=$("[name='id']").val();
			var namaBuku=$("[name='namaBuku']").val();
			var pengarang=$("[name='pengarang']").val();
			var tahunTerbit=$("[name='tahunTerbit']").val();

			$.ajax({
				type:"POST",
				data: "id="+id+"&namaBuku="+namaBuku+"&pengarang="+pengarang+"&tahunTerbit="+tahunTerbit,
				url: 'ubahData.php',
				success: function(result){
					console.log(result);
					onload();
				}
			})
		}
		function hapusData(idx){
			var id= idx;
			var tanya= confirm("yakin dihapus?");
			if (tanya) {
			$.ajax({
				type:"POST",
				data:"id="+id,
				url: 'hapusData.php',
				success: function(result){
					onload();
				}
			})}
		}
		function onload(){
			var dataHandler=$("#barisData");
			dataHandler.html("");
			$.ajax({
			type:"GET",
			data: "",
			url: 'ambilData.php',
			success : function (result){
				var objResult= JSON.parse(result);
				var nomor=1;
				$.each(objResult, function(key, val){
					
					var barisBaru=$("<tr>");
					barisBaru.html("<td>"+nomor+"</td><td>"+val.namaBuku+"</td><td>"+val.pengarang+"</td><td>"+val.tahunTerbit+"</td><td><button onclick='pilihData("+val.id+")'>Select</button></td><td><button onclick='hapusData("+val.id+")'>Hapus</button></td>");
					
					dataHandler.append(barisBaru);
					nomor++;
				})
			}
		})
		}
		
	</script>
</body>
</html>