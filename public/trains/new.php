<?php
require_once('../../private/initialize.php');

if (!isset($_GET['file_id'])) {
  redirect_to(url_for('/files/index.php'));
}

$file_id = $_GET['file_id'];

if (is_post_request()) {
  $train = [];
  $train = [];
  $train['line'] = isset($_POST['line']) ? $_POST['line'] : '';
  $train['route'] = isset($_POST['route']) ? $_POST['route'] : '';
  $train['run_number'] = isset($_POST['run_number']) ? $_POST['run_number'] : '';
  $train['operator_id'] = isset($_POST['operator_id']) ? $_POST['operator_id'] : '';
  $train['file_id'] =  $file_id;

  create_train($train);
  redirect_to(url_for('/files/show.php?id=' . $file_id));
}
?>

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
      <form action="<?php echo url_for('/trains/new.php?file_id=' . h(u($file_id))) ?>" method="post">
        <dl>
          <dt>Train Line</dt>
          <dd>
            <input type="text" name="line" />
          </dd>
        </dl>
        <dl>
          <dt>Route</dt>
          <dd>
            <input type="text" name="route" />
          </dd>
        </dl>
        <dl>
          <dt>Run Number</dt>
          <dd>
            <input type="text" name="run_number" />
          </dd>
        </dl>
        <dl>
          <dt>Operator ID</dt>
          <dd>
            <input type="text" name="operator_id" />
          </dd>
        </dl>
        <div id="submit">
          <input type="submit" value="Submit" />
        </div>
      </form>
    </div>
  </div>

  <footer></footer>
</body>

</html>