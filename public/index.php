<?php require_once('../private/initialize.php'); ?>

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
      <form>
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
        <tr>
          <td>El</td>
          <td>Brown</td>
          <td>E53245</td>
          <td>SJones</td>
        </tr>
        <tr>
          <td>Metra</td>
          <td>UPN</td>
          <td>E53246</td>
          <td>AJohnson</td>
        </tr>
        <tr>
          <td>Amtrak</td>
          <td>Hiawatha</td>
          <td>E53247</td>
          <td>LBeck</td>
        </tr>
      </table>
    </div>
  </div>

  <footer></footer>
</body>

</html>