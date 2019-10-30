<?php
	if (empty($_POST['2PtM'])){
		echo "兩分中:0<br>";
	}
	else{
		echo "兩分中:{$_POST['2PtM']}<br>";
	}
	if (empty($_POST['2PtA'])){
		echo "兩分未中:0<br>";
	}
	else{
		echo "兩分未中:{$_POST['2PtA']}<br>";
	}
	if (empty($_POST['3PtM'])){
		echo "三分中:0<br>";
	}
	else{
		echo "三分中:{$_POST['3PtM']}<br>";
	}
	if (empty($_POST['3PtA'])){
		echo "三分未中:0<br>";
	}
	else{
		echo "三分未中:{$_POST['3PtA']}<br>";
	}
	if (empty($_POST['FtM'])){
		echo "罰球中:0<br>";
	}
	else{
		echo "罰球中:{$_POST['FtM']}<br>";
	}
	if (empty($_POST['FtA'])){
		echo "罰球未中:0<br>";
	}
	else{
		echo "罰球未中:{$_POST['FtA']}<br>";
	}
	$mysqli = new mysqli('localhost','root','crayon25','player');
	if($mysqli->connect_error){
		die('無法建立資料連接:(' . $mysqli->connect_errno .') ' .  $mysqli->connect_error);
}
	$mysqli->set_charset("utf8");
	
	$Team = $_POST['Team'];
	$JN = $_POST['JN'];
	$event_2ptm = $_POST['2PtM'];
	$event_2pta = $_POST['2PtA'];
	$event_3ptm = $_POST['3PtM'];
	$event_3pta = $_POST['3PtA'];
	$event_ftm = $_POST['FtM'];
	$event_fta = $_POST['FtA'];
	$clear = $_POST['Clear'];


	$sql = "SELECT * FROM score WHERE Team = '$Team' AND JN = '$JN'";
	$result = mysqli_query($mysqli, $sql);
	$num = mysqli_num_rows($result);
	echo "$clear";

	if ($num != 1) {
		$action = "insert";
	}else{
		$action = "update";
	}
	echo "$action";
	echo "$Team";
	echo "$JN";
	if ($action == "update"){
		if($event_2ptm == "true"){
			$sql = "UPDATE score set 2PtM=2PtM+1 WHERE Team='$Team' AND JN = '$JN'";
		}else if($event_2pta == "true"){
			$sql = "UPDATE score set 2PtA=2PtA+1 WHERE Team='$Team' AND JN = '$JN'";
		}else if($event_3ptm == "true"){
			$sql = "UPDATE score set 3PtM=3PtM+1 WHERE Team='$Team' AND JN = '$JN'";
		}else if($event_3pta == "true"){
			$sql = "UPDATE score set 3PtA=3PtA+1 WHERE Team='$Team' AND JN = '$JN'";
		}else if($event_ftm == "true"){
			$sql = "UPDATE score set FtM=FtM+1 WHERE Team='$Team' AND JN = '$JN'";
		}else if($event_fta == "true"){
			$sql = "UPDATE score set FtA=FtA+1 WHERE Team='$Team' AND JN = '$JN'";
		}
	}else if ($action == "insert"){
		$sql = "INSERT INTO score (Team,JN,2PtM,2PtA,3PtM,3PtA,FtM,FtA) VALUES ('$Team','$JN',0,0,0,0,0,0)";
	}

	if($clear == "true"){
		$sql = "TRUNCATE TABLE score";
	}

	$mysqli->query($sql) or die ($mysqli->connect_error);
	$result->free();
	$mysqli->close();

?>