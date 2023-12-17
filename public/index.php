<?php
require_once('../private/initialize.php');

if (is_post_request() && isset($_FILES['csv'])) {
  $file_name = $_FILES["csv"]["tmp_name"];
  $file = fopen($file_name, "r");

  $data_array = [];

  while ($data = fgetcsv($file, 10000, ",")) {
    $data_array[] = $data;
  }
  fclose($file);
  $header = $data_array[0];
  $data = array_slice($data_array, 1);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Train Schedule</title>
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/index.css'); ?>" />
</head>

<body>
  <header class="center">
    <h1>Train Times</h1>
  </header>

  <div id="content">
    <div id="upload-form" class="center">
      <form action="<?php echo url_for('/index.php') ?>" method="post" enctype="multipart/form-data">
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
    <div id="train-content" class="center">
      <table>
        <tr>
          <th>Train Line</th>
          <th>Route</th>
          <th>Run Number</th>
          <th>Operator ID</th>
        </tr>
        <?php foreach ($data as $row) { ?>
          <tr>
            <?php foreach ($row as $col) { ?>
              <td><?php echo $col ?></td>
            <?php } ?>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>

  <footer></footer>
</body>

</html>