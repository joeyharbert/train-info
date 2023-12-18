<?php
require_once('../../private/initialize.php');

$file_set = find_all_files();
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
    <h1>Uploaded Train Info Files</h1>
  </header>

  <div id="content">

    <ul>
      <?php while ($file = mysqli_fetch_assoc($file_set)) { ?>
        <li><a href="<?php echo url_for('/files/show.php?id=' . $file['id']) ?>"><?php echo $file['name']; ?></a></li>
      <?php } ?>
    </ul>
  </div>

  <footer>
    <a href="<?php echo url_for('/files/new.php') ?>">Upload CSV</a>
  </footer>
</body>

</html>