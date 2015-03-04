<!DOCTYPE html>
<html>
<head>
	<title>Genre: {{ $genre->genre_name }}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	</style>
</head>
<body>

<?php if (Session::has('success')): ?>
	<p class="success"><?php echo Session::get('success'); ?></p>
<?php endif; ?>

<h1>Genre: {{ $genre->genre_name }}</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Rating</th>
			<th>Genre</th>
			<th>Label</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($dvds as $dvd): ?>
			<tr>
				<td><a href="/dvds/{{ $dvd->dvd_id }}">{{ $dvd->title }}</a></td>
				<td>{{ $dvd->rating->rating_name }}</td>
				<td>{{ $dvd->genre->genre_name }}</td>
				<td>{{ $dvd->label->label_name }}</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</body>
</html>