<?php
$pageName = '';
$filename = basename($_SERVER['PHP_SELF']);
if($filename == 'tabs.php') {
    $pageName = 'Tabs';

} elseif( $filename == 'sliders.php' ) {
    $pageName = 'Sliders';
}
 elseif( $filename == 'sliders.php' ) {
    $pageName = 'Sliders';
    
}
elseif( $filename == 'blog.php' ) {
  $pageName = 'Blog';
  
}
elseif( $filename == 'blog-list-sidebar-right.php' ) {
  $pageName = 'Blog List Sidebar Right';
  
}
elseif( $filename == 'blog-detail-with-sidebar.php' ) {
  $pageName = 'Blog Detail';
  
} 
elseif( $filename == 'blog-detail-without-sidebar.php' ) {
  $pageName = 'Blog Detail';
  
}
elseif( $filename == 'cart.php' ) {
    $pageName = 'Cart';
   
}
elseif( $filename == 'checkout.php' ) {
    $pageName = 'Checkout';
   
}
elseif( $filename == 'portfolio.php' ) {
    $pageName = 'Portfolio';
   
}
elseif( $filename == 'portfolio-single.php' ) {
    $pageName = 'Portfolio Single';
   
}
elseif( $filename == 'btn-and-form.php' ) {
    $pageName = 'Button & Form';
   
}
elseif( $filename == 'typography.php' ) {
    $pageName = 'Typography';
   
}
else {
    $pageName = '';
}
?>
            <!--Breadcrumb-->
            <section class="breadcrumb">
                <div class="breadcrumb-content bg--gray breadcrumb-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="breadcrumb-title"><?php echo $pageName; ?></h1>
                                <nav class="breadcrumb-link">
                                    <span><a href="home.html">Home</a></span>
                                    <span><?php echo $pageName; ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Breadcrumb-->