<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<?php
	$mysqli = new mysqli("localhost","root","crayon25","player");
	if($mysqli->connect_errno)
		die("無法建立資料連接:".$mysqli->connect_error);

	$mysqli->query("SET NAMES utf8");
	$result = $mysqli->query("SELECT * FROM score");
	
	echo"<table border ='1'align='center'><tr align='center'>";
	while($field = $result->fetch_field())
		if($field->name != "ID")
		echo"<td>".$field->name."</td>";
	echo"</tr>";

	while($row = $result->fetch_row()){
		echo"<tr>";
			for($i = 1;$i<$result->field_count;$i++)
				if($row[1] === "GSW")
					echo"<td>".$row[$i]."</td>";
		echo"</tr>";
	}
	echo"</table><br>";
		

	$mysqli->query("SET NAMES utf8");
	$result = $mysqli->query("SELECT * FROM score");
	
	echo"<table border ='1' align='center'><tr align='center'>";
	while($field = $result->fetch_field())
		if($field->name != "ID")
		echo"<td>".$field->name."</td>";
	echo"</tr>";

	while($row = $result->fetch_row()){
		echo"<tr>";
			for($i = 1;$i<$result->field_count;$i++)
				if($row[1] === "CC")
					echo"<td>".$row[$i]."</td>";
		echo"</tr>";
	}
	echo"</table>";
		
	$result->free();
	$mysqli->close();
	?>
</body>
</html>