<?php
require_once('../../private/initialize.php');

if (!isset($_GET['run_num'])) {
  redirect_to(url_for('/trains/index.php'));
}

$run_num = $_GET['run_num'];

if (is_post_request()) {
  $train = [];
  $train['line'] = isset($_POST['line']) ? $_POST['line'] : '';
  $train['route'] = isset($_POST['route']) ? $_POST['route'] : '';
  $train['run_number'] = isset($_POST['run_number']) ? $_POST['run_number'] : '';
  $train['operator_id'] = isset($_POST['operator_id']) ? $_POST['operator_id'] : '';

  update_train($train, $run_num);
  redirect_to(url_for('/trains/index.php'));
} else {
  $train = find_train_by_run_num($run_num);
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
      <form action="<?php echo url_for('/trains/edit.php?run_num=' . h(u($run_num))); ?>" method="post">
        <dl>
          <dt>Train Line</dt>
          <dd>
            <input type="text" name="line" value="<?php echo $train['line']; ?>" />
          </dd>
        </dl>
        <dl>
          <dt>Route</dt>
          <dd>
            <input type="text" name="route" value="<?php echo $train['route']; ?>" />
          </dd>
        </dl>
        <dl>
          <dt>Run Number</dt>
          <dd>
            <input type="text" name="run_number" value="<?php echo $train['run_number']; ?>" />
          </dd>
        </dl>
        <dl>
          <dt>Operator ID</dt>
          <dd>
            <input type="text" name="operator_id" value="<?php echo $train['operator_id']; ?>" />
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