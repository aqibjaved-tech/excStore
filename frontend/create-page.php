<?php
    // echo $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']); exit;
    include __DIR__."/connection.php";
    include __DIR__."/function.php";
// ob_start();
    // Check if page filename empty than page title will be page html file name.
    // //print_r($_POST); exit;
    if($_POST['pageFileName'] != ''){
      $original_name_of_file = $_POST['pageFileName'];
      $explode_filename = explode('.html',$original_name_of_file);
      if(count($explode_filename)>1){
        $original_name_of_file = $_POST['pageFileName'];
      }else{
        $original_name_of_file = $_POST['pageFileName'].'.html';
      }
      $name_of_uploaded_file = $original_name_of_file;
    }else{
      $original_name_of_file = str_replace(' ','-',strtolower($_POST['pageTitle']));
      $name_of_uploaded_file = $original_name_of_file;
    }

    // Get Site Information
    $siteData = get_records_where('sites','name','id',$_POST['siteid']);
    $row=mysqli_fetch_array($siteData,MYSQLI_ASSOC);
    $sitefoldername = str_replace(' ','-',strtolower($row['name'])).'-'.$_POST['siteid'];

    // Check site folder exist or Create
    if (!file_exists(__DIR__."/demo/$sitefoldername/")) {
      mkdir(__DIR__."/demo/$sitefoldername/", 0777, true);
    }

    // Check Site Asset folder for images etc...
    if (!file_exists(__DIR__."/demo/$sitefoldername/asset")) {
      mkdir(__DIR__."/demo/$sitefoldername/assets/", 0777, true);
      mkdir(__DIR__."/demo/$sitefoldername/assets/images/", 0777, true);
    }

    // check file exist or not
    $FileCounter = 0;
    while (file_exists(__DIR__."/demo/$sitefoldername/".$name_of_uploaded_file)) {
        $FileCounter++;
        $original_name_of_file = str_replace('.html','',$original_name_of_file);
        $name_of_uploaded_file = $original_name_of_file . '_' . $FileCounter . '.html';
    }

    // Create Site File
    $htmlfile = fopen(__DIR__."/demo/$sitefoldername/".$name_of_uploaded_file, "w") or die("Unable to open file!");
    $stylefile = fopen(__DIR__."/demo/$sitefoldername/style.css", "w") or die("Unable to open file!");
    $html = file_get_contents(BASE_URL.'demo/narrow-jumbotron/index.html', false);
    $css = file_get_contents(BASE_URL.'demo/narrow-jumbotron/style.css', false);
    // echo $html; exit;
    file_put_contents(__DIR__."/demo/$sitefoldername/".$name_of_uploaded_file, $html);
    file_put_contents(__DIR__."/demo/$sitefoldername/style.css", $css);

    fclose($htmlfile);
    fclose($stylefile);
    $file_path = "demo/$sitefoldername/".$name_of_uploaded_file;
    // echo $file_path; exit;
    $name_of_folder = "demo/$sitefoldername/";
    $name_of_file = str_replace('.html','',$original_name_of_file);
    $sql = "INSERT INTO pages (title,filepath,filecontent,status,siteid,filename, folderpath)
    VALUES ('".$_POST['pageTitle']."','".$file_path."','','Draft','".$_POST['siteid']."','".$name_of_file."','".$name_of_folder."')";
    //
    // echo $sql; exit;
    if ($con->query($sql) === TRUE) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        //exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    mysqli_close($con);
    echo $_SERVER['HTTP_REFERER'];
    ?>
