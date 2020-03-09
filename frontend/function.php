<?php
error_reporting(0);
define('BASE_URL', 'http://mystaging.me/ec-page-builder/frontend/');
define('Module_URL', 'http://mystaging.me/ec-page-builder/public/moduleAssets/');
// echo $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']); exit;
include __DIR__."/connection.php";

// global $con;
function get_records($table,$select){
  global $con;
  $sql = "SELECT $select FROM $table";
  $result = $con->query($sql);
  return $result;
}

function get_records_where($table,$select,$wherename, $wherevalue){
  global $con;
  $sql = "SELECT $select FROM $table where $wherename = $wherevalue";
  // echo $sql; exit;
  $result = $con->query($sql);
  return $result;
}
function limited_records_where($table,$select,$wherename, $wherevalue){
  global $con;
  $sql = "SELECT $select FROM $table where $wherename = $wherevalue limit 1";
  // echo $sql; exit;
  $result = $con->query($sql);
  return $result;
}

function delete_records($table,$wherename,$wherevalue){
  global $con;
  $sql = "DELETE FROM $table where $wherename = $wherevalue";
  $result = $con->query($sql);
  return $result;
}

?>
