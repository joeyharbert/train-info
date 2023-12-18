<?php

function create_file($file_name)
{
  global $db;
  $sql = "INSERT INTO files (name) VALUES ('" . $file_name . "')";
  $result = mysqli_query($db, $sql);
  db_insert_check($result);

  return mysqli_insert_id($db);
}

function create_train($train)
{
  global $db;
  $sql = "INSERT INTO trains (line, route, run_number, operator_id, file_id) VALUES (";
  $sql .= "'" . $train['line'] . "',";
  $sql .= "'" . $train['route'] . "',";
  $sql .= "'" . $train['run_number'] . "',";
  $sql .= "'" . $train['operator_id'] . "',";
  $sql .= "'" . $train['file_id'] . "')";

  $result = mysqli_query($db, $sql);

  db_insert_check($result);
}

function find_trains_by_file_id($file_id)
{
  global $db;
  $sql = "SELECT * FROM trains WHERE file_id='" . $file_id . "'";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_file_by_id($id)
{
  global $db;
  $sql = "SELECT * FROM files WHERE id='" . $id . "'";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $file = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $file;
}
