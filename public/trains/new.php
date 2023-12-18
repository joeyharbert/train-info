<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Train Info</title>
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/index.css'); ?>" />
</head>

<body>
  <header class="center">
    <h1>Add Train Info</h1>
  </header>

  <div id="content">
    <div id="upload-form" class="center">
      <form action="<?php echo url_for('/new.php') ?>" method="post" enctype="multipart/form-data">
        <dl>
          <dt>Upload CSV</dt>
          <dd><input type="file" name="csv" />
          </dd>
        </dl>
        <div id="submit">
          <input type="submit" value="Upload" />
        </div>
      </form>
    </div>
  </div>

  <footer></footer>
</body>

</html>