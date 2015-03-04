
<!doctype html> 
<html> 
<head>
    <title> DVD Create </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container auth">
    <?php foreach($errors->all() as $errorMessage):?>
            <p style="color:red;">
                <?php echo $errorMessage?>
            </p>
    <?php endforeach ?>
    <div style="background-color: greenyellow;">
        <?php if (Session::has('success')) : ?>
            <p>
                <?php echo Session::get('success') ?>
            </p>
        <?php endif ?>
    </div>
    <h1 class="text-center">DVD Creation with Laravel </h1>
    <div id="big-form" class="well auth-box">
    <form action="/dvds/insert" method="post" class="form">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" >
        <fieldset>
          
          <div class="form-group">
            <label class=" control-label">DVD Title</label>
            <div class="">
                   <label>Title:</label>
                    <input name="title" class="form-control" value="<?php echo Request::old('title')?>">
            </div>
          </div>

          <div class="form-group">
            <div class="">
              <label class=" control-label">Genre</label>
              <select class="form-control" name="genre">
                <?php foreach($genres as $genre) : ?>
                    <?php if ($genre->id == Request::old('genre')) : ?>
                        <?php echo " <option selected=\"selected\" value=\" $genre->id \"> $genre->genre_name </option>"?>
                    <?php else :?>
                        <?php echo " <option value=\" $genre->id \"> $genre->genre_name </option>"?>
                    <?php endif ?>
                <?php endforeach ?>
            </select> 
            </div>
        </div> 

        <div class="form-group">
            <div class="">
            <label class="control-label"> Label </label>
            <select class="form-control" name="label">
                <?php foreach($labels as $label) : ?>
                    <?php if ($label->id == Request::old('label')) : ?>
                        <?php echo " <option selected=\"selected\" value=\" $label->id \"> $label->label_name </option>"?>
                    <?php else :?>
                        <?php echo " <option value=\" $label->id \"> $label->label_name </option>"?>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            </div>
        </div>       

         <div class="form-group">
            <div class="">
            <label class="control-label"> Sound </label>
              <select class="form-control" name="sound">
                <?php foreach($sounds as $sound) : ?>
                    <?php if ($sound->id == Request::old('sound')) : ?>
                        <?php echo " <option selected=\"selected\" value=\" $sound->id \"> $sound->sound_name </option>"?>
                    <?php else :?>
                        <?php echo " <option value=\" $sound->id \"> $sound->sound_name </option>"?>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group">
            <div class="">
            <label class="control-label"> Rating </label>
          <select class="form-control" name="rating">
                <?php foreach($ratings as $rating) : ?>
                    <?php if ($rating->id == Request::old('rating')) : ?>
                        <?php echo " <option selected=\"selected\" value=\" $rating->id \"> $rating->rating_name </option>"?>
                    <?php else :?>
                        <?php echo " <option value=\" $rating->id \"> $rating->rating_name </option>"?>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            </div>
        </div>

        <div class="form-group">
            <div class="">
            <label class="control-label"> Format </label>
          <select class="form-control" name="format">
                <?php foreach($formats as $format) : ?>
                    <?php if ($format->id == Request::old('format')) : ?>
                        <?php echo " <option selected=\"selected\" value=\" $format->id \"> $format->format_name </option>"?>
                    <?php else :?>
                        <?php echo " <option value=\" $format->id \"> $format->format_name </option>"?>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            </div>
        </div>
        </fieldset>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
</body>
</html>


