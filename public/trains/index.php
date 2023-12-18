<?php
require_once('../../private/initialize.php');
$page = 1;

if (isset($_GET['page'])) {
  $page = (int)$_GET['page'];
}
$sort = 'run_number';

if (is_post_request()) {
  $sort = $_POST['sort'];
}

$train_set = find_trains($page, $sort);
$page_count = page_count();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Train Info</title>
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/index.css'); ?>" />
</head>

<body>
  <header class="center">
    <h1>Train Info </h1>
  </header>

  <div id="content">
    <div>
      <a href="<?php echo url_for('/index.php') ?>">&laquo; Back to File Upload</a>
    </div>
    <div>
      <form id="sort" action="<?php echo url_for('trains/index.php?page=' . h(u($page))) ?>" method="post">
        <select name="sort" onChange="document.getElementById('sort').submit()">
          <option value="run_number">Run Number</option>
          <option value="line">Train Line</option>
          <option value="route">Route</option>
          <option value="operator_id">Operator ID</option>
        </select>
      </form>
    </div>
    <div id="train-content" class="center">
      <table>
        <tr>
          <th>Train Line</th>
          <th>Route</th>
          <th>Run Number</th>
          <th>Operator ID</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        <?php while ($train = mysqli_fetch_assoc($train_set)) {
        ?>
          <td><?php echo $train['line'] ?></td>
          <td><?php echo $train['route'] ?></td>
          <td><?php echo $train['run_number'] ?></td>
          <td><?php echo $train['operator_id'] ?></td>
          <td><a href="<?php echo url_for('/trains/edit.php?run_num=' . h(u($train['run_number']))); ?>">Edit</a></td>
          <td><a href="<?php echo url_for('/trains/destroy.php?run_num=' . h(u($train['run_number']))); ?>">Delete</a></td>
          </tr>
        <?php }
        ?>
      </table>
      <?php mysqli_free_result($train_set) ?>
    </div>
  </div>

  <footer class="center">
    <div id="pagination" class="center">
      <?php if ($page - 1 > 0) { ?>
        <a id="back" href="<?php echo url_for('/trains/index.php?page=' . ($page - 1)) ?>">Back</a>
      <?php } ?>

      <?php for ($i = 1; $i <= $page_count; $i++) { ?>
        <a href="<?php echo url_for('/trains/index.php?page=' . $i); ?>" class="<?php echo $i == $page ? "bold" : ""; ?>"><?php echo $i ?></a>
      <?php } ?>

      <?php if ($page + 1 <= $page_count) { ?>
        <a id="next" href="<?php echo url_for('/trains/index.php?page=' . ($page + 1)) ?>">Next</a>
      <?php } ?>

    </div>
    <a href="<?php echo url_for('/trains/new.php') ?>">New Train</a>
  </footer>
</body>

</html>