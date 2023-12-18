<?php
require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
  redirect_to(url_for('/index.php'));
}

$id = $_GET['id'];
$data = [];
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
    <h1>Train Info - <?php echo $id ?></h1>
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
        <?php //foreach ($data as $row) { 
        ?>
        <tr>
          <?php //foreach ($row as $col) { 
          ?>
          <td><?php //echo $col 
              ?></td>
          <?php //} 
          ?>
        </tr>
        <?php //} 
        ?>
      </table>
    </div>
  </div>

  <footer></footer>
</body>

</html>