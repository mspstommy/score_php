<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			Post
		</title>
	</head>
	<body>
		<form action="request.php" method="post" id=post>
			隊伍:<br>
			<input type="text" name="Team"><br>
			球員號碼:<br>
			<input type="text" name="JN"><br>
			兩分中:<br>
			<input type="text" name="2PtM"><br>
			兩分未中:<br>
			<input type="text" name="2PtA"><br>
			三分中:<br>
			<input type="text" name="3PtM"><br>
			三分未中:<br>
			<input type="text" name="3PtA"><br>
			罰球中:<br>
			<input type="text" name="FtM"><br>
			罰球未中:<br>
			<input type="text" name="FtA"><br>
		</form>
		<button type="submit" form="post" value="Submit">提交</button>
		<form action="request.php" method="post" id=post>
			<input type="hidden" name="Clear" value="1">
		</form>
		<button type="submit" form="post" value="Submit">清空資料表</button>
	</body>
</html>