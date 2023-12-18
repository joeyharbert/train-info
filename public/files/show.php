<?php
require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to(url_for('/index.php'));
}

$id = $_GET['id'];
$file = find_file_by_id($id);
$train_set = find_trains_by_file_id($id);

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
    <h1>Train Info - <?php echo $file['name'] ?></h1>
  </header>

  <div id="content">
    <div id="train-content" class="center">
      <table>
        <tr>
          <th>Train Line</th>
          <th>Route</th>
          <th>Run Number</th>
          <th>Operator ID</th>
        </tr>
        <?php while ($train = mysqli_fetch_assoc($train_set)) {
        ?>
          <td><?php echo $train['line'] ?></td>
          <td><?php echo $train['route'] ?></td>
          <td><?php echo $train['run_number'] ?></td>
          <td><?php echo $train['operator_id'] ?></td>
          </tr>
        <?php }
        ?>
      </table>
      <?php mysqli_free_result($train_set) ?>
    </div>
  </div>

  <footer></footer>
</body>

</html>