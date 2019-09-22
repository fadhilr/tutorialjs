<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<h1 id="barisData">
	<button onclick="tampilData()">Show</button>
	</h1>
	<h1>Hasil</h1>
	<script type="text/javascript">

		function tampilData(){
			var dataHandler=$("#barisData");
			$.ajax({
				type: "GET",
				data:"",
				url: 'acakData.php',
				success: function(result){
					var barisBaru=$("<p>");
					barisBaru.html(result+"</p>");
					
					dataHandler.append(barisBaru);
				}
			})
		}

	</script>
</body>
</html>