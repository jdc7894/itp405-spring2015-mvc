<!doctype html> 
<html> 
<head>
	<title> DVD Search </title>
</head>
<body> 


<h1> DVD Search </h1>
<form action="/dvds" method="get">
	<input type="text" name="dvd_title">
	<select>
	<?php foreach($genres as $genre) : ?>
    <?php endforeach ?>


	</select>

	<input type="submit" value="Search">
</form>

</body>
</html>