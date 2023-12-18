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


<?php include(SHARED_PATH . '/header.php') ?>
<div id="content" class="container">
  <h1 class="center pt-4">Upload Train Info</h1>
  <div class="center">
    <form id="sort" action="<?php echo url_for('trains/index.php?page=' . h(u($page))) ?>" method="post">
      <select id="sort" class="form-select" name="sort" onChange="document.getElementById('sort').submit()">
        <option value="run_number" <?php echo $sort == "run_number" ? " selected" : ""; ?>>Run Number</option>
        <option value="line" <?php echo $sort == "line" ? " selected" : ""; ?>>Train Line</option>
        <option value="route" <?php echo $sort == "route" ? " selected" : ""; ?>>Route</option>
        <option value="operator_id" <?php echo $sort == "operator_id" ? " selected" : ""; ?>>Operator ID</option>
      </select>
    </form>
  </div>
  <div id="train-content" class="center">
    <table class="table">
      <tr>
        <th scope="col">Train Line</th>
        <th scope="col">Route</th>
        <th scope="col">Run Number</th>
        <th scope="col">Operator ID</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
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

<div class="center">
  <a href="<?php echo url_for('/trains/new.php') ?>">New Train</a>
</div>

<nav aria-label="Page navigation" class="mx-auto">
  <ul class="pagination">
    <li class="page-item">
      <?php if ($page - 1 > 0) { ?>
        <a id="back" aria-label="Previous" class="page-link" href="<?php echo url_for('/trains/index.php?page=' . ($page - 1)) ?>"><span aria-hidden="true">&laquo;</span></a>
      <?php } else { ?>
        <a class="page-link disabled" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      <?php } ?>
    </li>
    <?php for ($i = 1; $i <= $page_count; $i++) { ?>
      <li class="page-item"><a href="<?php echo url_for('/trains/index.php?page=' . $i); ?>" class="<?php echo $i == $page ? "selected" : ""; ?> page-link"><?php echo $i ?></a></li>
    <?php } ?>
    <li class="page-item">
      <?php if ($page + 1 <= $page_count) { ?>
        <a id="next" class="page-link" href="<?php echo url_for('/trains/index.php?page=' . ($page + 1)) ?>"><span aria-hidden="true">&raquo;</span></a>
      <?php } else { ?>
        <a class="page-link disabled" href="#" aria-label="Previous">
          <span aria-hidden="true">&raquo;</span>
        </a>
      <?php } ?>
    </li>
  </ul>
</nav>
<?php include(SHARED_PATH . '/footer.php') ?>