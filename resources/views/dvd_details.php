<!doctype html> 
<html> 
<head>
    <title> DVD Review </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container auth">
    <h3 class="text-center">Title:<?php echo $dvd->title ?> </h3>
    <div id="big-form" class="well auth-box">
        <form action="/reviews/new" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" >
        <input type="hidden" name="dvd_id" value="<?php echo $dvd->dvd_id ?>">
        <fieldset>
          
          <div class="form-group">
            <p>
                Genre: <?php echo $dvd->genre_name ?>
            <br>Rating: <?php echo $dvd->rating_name ?>
            <br>Label: <?php echo $dvd->label_name ?>
            <br>Sound: <?php echo $dvd->sound_name ?>
            <br>Format: <?php echo $dvd->format_name ?>
            <br>Release Date: <?php echo date("Y-m-d", strtotime($dvd->release_date)) ?>
            </p>
          </div>

          <div class="form-group">
            <div class="">
              <label class=" control-label">Ratings</label>
                <select name="rating">
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                 <option value="7">7</option>
                 <option value="8">8</option>
                 <option value="9">9</option>
                 <option value="10">10</option>
                </select> &nbsp;&nbsp;&nbsp;&nbsp;
          <label class=" control-label">Title</label>
                <input type="text" name="title">
            </div>
          </div>
            <div class="form-group">
                    <div class="">
                    <label class=" control-label">Description</label>
                    <textarea name="description"></textarea>
                    </div>
          </div>

          <div class="form-group" align="center">
            <div class="">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Rate DVD</button>
            </div>
          </div>
        </fieldset>
      </form>
      <br>  

        <?php foreach ($errors->all() as $errorMessage): ?>
            <p class="error" style="color:red">Error: <?php echo $errorMessage; ?></p>
        <?php endforeach; ?>

        <?php if (Session::has('success')): ?>
            <p><?php echo Session::get('success'); ?></p>
        <?php endif; ?>

    </div>
    <div class="clearfix"></div>
  </div>
  <table class="table table-striped">
    <thead>
        <tr>
            <th>Rating</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reviews as $review): ?>
            <tr>
                <td><?php echo $review->rating ?></td>
                <td><?php echo $review->title ?></td>
                <td><?php echo $review->description ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>


