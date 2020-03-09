
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>SiiMii | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{{URL::to('public')}}}/assets/pages/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{{URL::to('public')}}}/assets/pages/css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{{URL::to('public')}}}/assets/pages/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      
        <!-- END GLOBAL MANDATORY STYLES -->
        
 
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{{URL::to('public')}}}/assets/pages/css/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{{URL::to('public')}}}/assets/pages/css/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{{URL::to('public')}}}/assets/pages/css/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{{URL::to('public')}}}/assets/pages/css/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{{URL::to('public')}}}/assets/pages/css/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        
        @include('template/admin/includes/header')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                @include('template/admin/parts/sidebarmenu')
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    <h3 class="page-title"> Terms and Conditions
                        <small>terms&conditions</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Terms and Conditions</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE HEADER-->
                    
                    
                   
                        
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Terms and Conditions</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="{{{URL::to('')}}}/admin/edittermscondition"  class="form-horizontal" role="form" method="post">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                            
                                            <div class="form-group">
                                            <label class="control-label col-md-3">Terms & Conditions Number
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input class="form-control" name="tcnumber" type="text" value="{{{ 
                                                        $data['edittermsconditions']['tcnumber']
                                                     }}}">

                                                     <input class="form-control" name="id" type="hidden" value="{{{ 
                                                        $data['edittermsconditions']['id']
                                                     }}}"> </div>
                                            </div>    
                                            <div class="form-group last">
                                                <label class="control-label col-md-3">Terms & Conditions Text
                                                    <span class="required"> </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="ckeditor form-control" name="tctext" rows="6" >{!! $data['edittermsconditions']['tctext'] !!}</textarea>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2016 &copy; SiiMii (Moments. Memories. Life.) by DWG.
                
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div> 
        
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
            <script src="../assets/global/plugins/respond.min.js"></script>
            <script src="../assets/global/plugins/excanvas.min.js"></script> 
            <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/jquery.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
       
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>