<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form  enctype="multipart/form-data" method="post" action="upload">
		@csrf
		<input multiple type="file" name="images[]">
		<button type="submit">ADD</button>
	</form>
</body>
</html>