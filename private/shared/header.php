<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Train Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/index.css'); ?>" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo url_for('/index.php') ?>">Train Info</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo url_for('/index.php') ?>">Upload</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="<?php echo url_for('/trains/index.php?page=1') ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Trains
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo url_for('/trains/index.php?page=1') ?>">All Trains</a></li>
                <li><a class="dropdown-item" href="<?php echo url_for('/trains/new.php') ?>">Add a Train</a></li>
              </ul>
            </li>
        </div>
      </div>
    </nav>
  </header>