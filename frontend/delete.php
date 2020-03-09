<?php
    // echo $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']); exit;
    include __DIR__."/connection.php";
    include __DIR__."/function.php";
    // echo $_GET['pageid']; exit;
    $page_data = limited_records_where('pages','folderpath,filename','id',$_GET['pageid']);
    $page_record = mysqli_fetch_object($page_data);
    $site_folder = $page_record->folderpath.$page_record->filename.'.html'; 
    unlink($site_folder);
    delete_records('pages','id',$_GET['pageid']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
    ?>
