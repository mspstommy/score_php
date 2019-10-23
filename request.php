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
		echo "三分中:{$_POST['3PtA']}<br>";
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
	$player_2ptm = $_POST['2PtM'];
	$player_2pta = $_POST['2PtA'];
	$player_3ptm = $_POST['3PtM'];
	$player_3pta = $_POST['3PtA'];
	$player_ftm = $_POST['FtM'];
	$player_fta = $_POST['FtA'];
	$clear = $_POST['Clear'];


	$sql = "SELECT * FROM score WHERE Team = '$Team' AND JN = '$JN'";
	$result = mysqli_query($mysqli, $sql);
	$num = mysqli_num_rows($result);
	echo "$clear";

	if ($num != 1) {
		$sql = "INSERT INTO score (Team,JN,2PtM,2PtA,3PtM,3PtA,FtM,FtA) VALUES ('$Team','$JN','$player_2ptm','$player_2pta','$player_3ptm','$player_3pta','$player_ftm','$player_fta')";
	}else{
		$sql = "UPDATE score set 2PtM = '$player_2ptm',2PtA = '$player_2pta',3PtM = '$player_3ptm',3PtA = '$player_3pta',FtM = '$player_ftm',FtA = '$player_fta' WHERE Team='$Team' AND JN = '$JN'";
	}

	if($clear == "true"){
		$sql = "TRUNCATE TABLE score";
	}

	$mysqli->query($sql) or die ($mysqli->connect_error);
	$result->free();
	$mysqli->close();

?>