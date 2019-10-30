<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			Post
		</title>
	</head>
	<body>
		<form action="request.php" method="post" id=player>
			<input type="text" name="Team"><br>
			<input type="text" name="JN"><br>
			<input type="hidden" name="2PtM" value="0">
			<input type="hidden" name="2PtA" value="0">
			<input type="hidden" name="3PtM" value="0">
			<input type="hidden" name="3PtA" value="0">
			<input type="hidden" name="FtM" value="0">
			<input type="hidden" name="FtA" value="0">
			<input type="hidden" name="Clear" value="0">
			<button type="submit" name="2PtM" value="true">兩分中</button>
			<button type="submit" name="2PtA" value="true">兩分未中</button>
			<button type="submit" name="3PtM" value="true">三分中</button>
			<button type="submit" name="3PtA" value="true">三分未中</button>
			<button type="submit" name="FtM" value="true">罰球中</button>
			<button type="submit" name="FtA" value="true">罰球未中</button>
			<button type="submit" name="Clear" value="true">清空資料表</button>
		</form>
	</body>
</html>