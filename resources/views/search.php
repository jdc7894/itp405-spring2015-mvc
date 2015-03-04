<!doctype html> 
<html> 
<head>
	<title> DVD Search </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container auth">
    <h1 class="text-center">DVD Search with Laravel </h1>
    <div id="big-form" class="well auth-box">
        <form action="/dvds" method="get">
        <fieldset>
          
          <div class="form-group">
            <label class=" control-label">DVD Title</label>
            <div class="">
                    <input type="text" class="form-control" name="dvd_title" id="dvd_title">
            </div>
          </div>

          <div class="form-group">
          	<div class="">
          	  <label class=" control-label">DVD Genre</label>
          		<select name="genre_id">
			     <option value="0">All</option>
				 <?php foreach($genres as $genre) : ?>
		         <option value="<?php echo $genre->id ?>"><?php echo $genre->genre_name ?></option>
		         <?php endforeach ?>
				</select> &nbsp;&nbsp;&nbsp;&nbsp;
          <label class=" control-label">DVD Rating</label>
				<select name="rating_id">
			     <option value="0">All</option>
				 <?php foreach($ratings as $rating) : ?>
		         <option value="<?php echo $rating->id ?>"><?php echo $rating->rating_name ?></option>
		         <?php endforeach ?>
				</select>
          	</div>
          </div>

          <div class="form-group" align="center">
            <div class="">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Search DVD</button>
            </div>
          </div>
        </fieldset>
        <h3>Genres</h4>
                <?php foreach ($genres as $genre): ?>
                  <li><a href="/genres/<?php echo $genre->genre_name ?>/dvds"><?php echo $genre->genre_name ?></li>
                <?php endforeach; ?>
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
</body>
</html>