<?php
require_once('../../private/initialize.php');


if (is_post_request()) {
  $train = [];
  $train['line'] = isset($_POST['line']) ? $_POST['line'] : '';
  $train['route'] = isset($_POST['route']) ? $_POST['route'] : '';
  $train['run_number'] = isset($_POST['run_number']) ? $_POST['run_number'] : '';
  $train['operator_id'] = isset($_POST['operator_id']) ? $_POST['operator_id'] : '';

  create_train($train);
  redirect_to(url_for('/trains/index.php'));
}
?>

<?php include(SHARED_PATH . '/header.php') ?>

<div id="content">
  <h1 class="center">Add Train Info</h1>
  <div id="new-train" class="center">
    <form action="<?php echo url_for('/trains/new.php'); ?>" method="post" class="rounded border border-1 p-2 mt-4 px-5">
      <div class="mb-3">
        <label for="line" class="form-label">Train Line</label>
        <input type="text" class="form-control" name="line" id="line" />
      </div>
      <div class="mb-3">
        <label for="route" class="form-label">Route</label>
        <input type="text" class="form-control" name="route" id="route" />
      </div>
      <div class="mb-3">
        <label for="run_number" class="form-label">Run Number</label>
        <input type="text" class="form-control" name="run_number" id="run_number" />
      </div>
      <div class="mb-3">
        <label for="operator_id" class="form-label">Operator ID</label>
        <input type="text" class="form-control" name="operator_id" id="operator_id" />
      </div>
      <div id="submit">
        <input type="submit" value="Submit" class="btn btn-secondary" />
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH . '/footer.php') ?>