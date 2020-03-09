<?php
include __DIR__."/function.php";
////print_r($_POST); exit;
$sitedata = limited_records_where('sites','name,id', 'id', $_POST['siteid']);
$themeid = mysqli_fetch_object($sitedata);
//echo $themeid->id; exit;
$sitefoldername = str_replace(' ','-',strtolower($themeid->name)).'-'.$themeid->id;
// echo $sitefoldername;
//  $sitefoldername = $_POST['foldername'];
//  echo $sitefoldername.'---'; exit;
define('UPLOAD_FOLDER', __DIR__ . '/demo/'.$sitefoldername.'/assets/images/');
define('UPLOAD_PATH', '/demo/'.$sitefoldername.'/assets/images/');

$doc = ($_FILES['file']['name']);
$target = __DIR__ . '/demo/'.$sitefoldername.'/assets/images/';
$target = $target . basename($doc);

move_uploaded_file($_FILES['file']['tmp_name'], $target);
echo BASE_URL.'demo/'.$sitefoldername.'/assets/images/'. $_FILES['file']['name'];