<?php

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

function find_trains()
{
  global $db;
  $sql = "SELECT * FROM trains ORDER BY run_number";

  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function drop_train_table_data()
{
  global $db;
  $sql = "TRUNCATE TABLE train_info";
  mysqli_query($db, $sql);
}
