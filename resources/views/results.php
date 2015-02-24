<!doctype html> 
<html> 
<head>
	<title>Results</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body> 

<p>
	You searched for <?php echo $song_title ?> 
</p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Artist</th>
			<th>Title</th>
			<th>Genre</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($songs as $song) : ?> 
		<tr>
			<td><a href="dvds/<?php echo $dvd->dvd_id ?>"><?php echo $dvd->title ?></a></td>
			<td><?php echo $song->artist_name ?></td>
			<td><?php echo $song->title ?></td>
			<td><?php echo $song->genre ?></td>
		</tr>
	<?php endforeach ?> 	
	</tbody>
</table>

</body>



</html>