<?php
require_once('../../private/initialize.php');

if (!isset($_GET['run_num'])) {
  redirect_to(url_for('/trains/index.php'));
}

$run_num = $_GET['run_num'];

delete_train_by_run_num($run_num);
redirect_to(url_for('/trains/index.php'));
