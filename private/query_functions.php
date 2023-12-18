<?php

function create_file($file_name)
{
  global $db;
  $sql = "INSERT INTO files (file_name) VALUES ('" . $file_name . "')";
  $result = mysqli_query($db, $sql);
  db_insert_check($result);

  return mysqli_insert_id($db);
}

function db_insert_check($result)
{
  global $db;
  if (!$result) {
    //INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
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
