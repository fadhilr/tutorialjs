<?php 
	
		// $lines = file('quote.txt'); 
		// echo "<h3>Tampilkan satu baris data secara acak</h3><hr>";
		// foreach ($lines as $line_num => $line){
		// 	print "<font color=red>Line #{$line_num}</font> : " . $line . "<br />\n"; 
		// }
	
// $fh = fopen("quote.txt", "r");
//  foreach ($fh as $data){
				
// 			};
// $file = file_get_contents("quote.txt");
// echo $data;
	$lines = file('quote.txt');
	foreach($lines as $line){
	    $data [] = trim($line);   
	}
	$acak = array_rand($data);
	// $result=$data[$acak];
	echo $data[$acak];
	
		
 ?>