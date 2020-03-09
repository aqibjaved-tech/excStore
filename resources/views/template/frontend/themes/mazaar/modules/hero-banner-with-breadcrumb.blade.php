<?php
$pageName = '';
$filename = basename($_SERVER['PHP_SELF']);
if($filename == 'about.php') {
    $pageName = 'About Us';

}
elseif( $filename == 'contact.php' ) {
    $pageName = 'Contact Us';

}
elseif( $filename == 'product-listing-without-sidebar.php' ) {
    $pageName = 'Man Clothing Fashion';

}
elseif( $filename == 'product-listing-right-sidebar.php' ) {
    $pageName = 'Man Clothing Fashion';

}
elseif( $filename == 'product-listing-left-sidebar.php' ) {
    $pageName = 'Man Clothing Fashion';

}
elseif( $filename == 'product-detail.php' ) {
    $pageName = 'Man Clothing Fashion';

}
elseif( $filename == 'product-detail-02.php' ) {
    $pageName = 'Man Clothing Fashion';

}
elseif( $filename == 'product-detail-03.php' ) {
    $pageName = 'Man Clothing Fashion';

}
elseif( $filename == 'product-detail-04.php' ) {
    $pageName = 'Man Clothing Fashion';

}
elseif( $filename == 'login_register.php' ) {
    $pageName = 'My Account';
}
else {
    $pageName = '';
}
// if($bannerimg == ''){
//   $bannerimg = $bannerimg;
// }else{
//   $bannerimg = '';
// }
// {{$bannerimg}}

?>

            <!--Breadcrumb-->
            <section class="breadcrumb">
                <div class="background-image" data-background="/assets/mazaar/img/bg_img/bg_001.jpg" data-bg-posx="center" data-bg-posy="center" data-bg-overlay="4"></div>
                <div class="breadcrumb-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="breadcrumb-title"><?php echo $pageName; ?></h1>
                                <nav class="breadcrumb-link">
                                    <?php
                                      $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
                                      $counter = 0;
                                      foreach($crumbs as $crumb){
                                      if($counter == 0){
                                        echo "<span><a href=".url('/').">Home</a></span>";
                                      }else {
                                        $crumb = str_replace("%20"," ",$crumb);
                                        if(!str_contains($crumb,'product-filter')){
                                            echo  "<span><a href=''>".ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . '').'</a></span>';
                                        }else{
                                         echo " Search Result";
                                        }
                                      }
                                      $counter++;
                                      }
                                     //echo $pageName;
                                    ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Breadcrumb-->
