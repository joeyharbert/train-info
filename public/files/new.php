<?php
require_once('../../private/initialize.php');
$orig_file_name = "Train Info";
if (is_post_request() && isset($_FILES['csv'])) {
  $file_name = $_FILES["csv"]["tmp_name"];
  $orig_file_name = $_FILES["csv"]["name"];
  $file = fopen($file_name, "r");

  $data_array = [];

  while ($data = fgetcsv($file, 10000, ",")) {
    $data_array[] = $data;
  }
  fclose($file);
  $header = $data_array[0];
  $data = array_slice($data_array, 1);

  //create file in db
  $file_id = create_file($orig_file_name);

  //create train data in db
  foreach ($data as $row) {
    $train = [];
    $train['line'] =  $row[0];
    $train['route'] =  $row[1];
    $train['run_number'] =  $row[2];
    $train['operator_id'] =  $row[3];
    $train['file_id'] =  $file_id;

    $result = create_train($train);
  }

  db_disconnect($db);
  redirect_to(url_for('/files/show.php?id=' . $file_id));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Train Info</title>
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/index.css'); ?>" />
</head>

<body>
  <header class="center">
    <h1>Upload Train Info</h1>
  </header>

  <div id="content">
    <a href="<?php echo url_for('/files/index.php') ?>">&laquo; Back to File List</a>
    <div id="upload-form" class="center">
      <form action="<?php echo url_for('/files/new.php') ?>" method="post" enctype="multipart/form-data">
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