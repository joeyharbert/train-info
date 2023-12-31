<?php

$page_size = 5;

function create_train($train)
{
  global $db;

  $sql = "INSERT INTO trains (line, route, run_number, operator_id) VALUES (";
  $sql .= "'" . $train['line'] . "',";
  $sql .= "'" . $train['route'] . "',";
  $sql .= "'" . $train['run_number'] . "',";
  $sql .= "'" . $train['operator_id'] . "')";

  $result = mysqli_query($db, $sql);

  //TODO: figure out why on earth the string check is returning a 500
  // db_insert_check($result);
}

function find_trains($page, $sort)
{
  global $db;
  global $page_size;

  $offset = 0;

  if ($page) {
    $offset = ($page - 1) * $page_size;
  }

  $sql = "SELECT * FROM trains ORDER BY " . $sort . " ";
  $sql .= "LIMIT " . $page_size . " ";
  $sql .= "OFFSET " . $offset;

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function page_count()
{
  global $db;
  global $page_size;

  $sql = "SELECT COUNT(*) FROM trains";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $count = mysqli_fetch_array($result)[0];
  mysqli_free_result($result);

  return ceil($count / $page_size);
}

function update_train($train, $run_num)
{
  global $db;

  $sql = "UPDATE trains SET ";
  $sql .= "line='" . $train['line'] . "', ";
  $sql .= "route='" . $train['route'] . "', ";
  $sql .= "run_number='" . $train['run_number'] . "', ";
  $sql .= "operator_id='" . $train['operator_id'] . "' ";
  $sql .= "WHERE run_number='" . $run_num . "' ";
  $sql .= "LIMIT 1";
  echo $sql;
  $result = mysqli_query($db, $sql);

  db_insert_check($result);
  return true;
}

function find_train_by_run_num($run_num)
{
  global $db;

  $sql = "SELECT * FROM trains WHERE run_number='" . $run_num . "'";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $train = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $train;
}

function delete_train_by_run_num($run_num)
{
  global $db;

  $sql = "DELETE FROM trains WHERE run_number='" . $run_num . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  db_insert_check($result);
}

function drop_train_table_data()
{
  global $db;
  $sql = "TRUNCATE TABLE train_info";
  mysqli_query($db, $sql);
}
