<?php
require_once('../private/initialize.php');
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

  //empty data in case multiple files
  drop_train_table_data();

  //create train data in db
  foreach ($data as $row) {
    $train = [];
    $train['line'] =  $row[0];
    $train['route'] =  $row[1];
    $train['run_number'] =  $row[2];
    $train['operator_id'] =  $row[3];

    $result = create_train($train);
  }

  db_disconnect($db);

  redirect_to(url_for('/trains/index.php'));
}
?>

<?php include(SHARED_PATH . '/header.php') ?>

<div id="content" class="container">
  <h1 class="center pt-4">Upload Train Info</h1>
  <div id="upload-form" class="center mt-3">
    <form action="<?php echo url_for('/index.php') ?>" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="formFile" class="form-label">Upload CSV</label>
        <input class="form-control" type="file" id="formFile" name="csv">
      </div>
      <div id="submit">
        <input type="submit" class="btn btn-secondary" value="Upload" />
      </div>
    </form>

  </div>
</div>

<?php include(SHARED_PATH . '/footer.php') ?>