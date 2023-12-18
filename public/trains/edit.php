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

<?php include(SHARED_PATH . '/header.php') ?>

<div id="content">
  <h1 class="center">Edit Train Info</h1>
  <div id="edit-train" class="center">
    <form action="<?php echo url_for('/trains/edit.php?run_num=' . h(u($run_num))); ?>" method="post" class="rounded border border-1 p-2 mt-4 px-5">
      <div class="mb-3">
        <label for="line" class="form-label">Train Line</label>
        <input class="form-control" type="text" name="line" id="line" value="<?php echo $train['line']; ?>" />
      </div>
      <div class="mb-3">
        <label for="route" class="form-label">Route</label>
        <input class="form-control" type="text" name="route" id="route" value="<?php echo $train['route']; ?>" />
      </div>
      <div class="mb-3">
        <label for="run_number" class="form-label">Run Number</label>
        <input class="form-control" type="text" name="run_number" id="run_number" value="<?php echo $train['run_number']; ?>" />
      </div>
      <div class="mb-3">
        <label for="operator_id" class="form-label">Operator ID</label>
        <input class="form-control" type="text" name="operator_id" id="operator_id" value="<?php echo $train['operator_id']; ?>" />
      </div>
      <div id="submit">
        <input type="submit" value="Submit" class="btn btn-secondary" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/footer.php') ?>