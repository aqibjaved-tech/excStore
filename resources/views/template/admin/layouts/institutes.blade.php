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
    <head>
    @include('template/admin/includes/head')
        <link href="{{{URL::to('public')}}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{{URL::to('public')}}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
</head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        @yield('content')
        <!-- BEGIN CORE PLUGINS -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{{URL::to('public')}}}/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{{URL::to('public')}}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{{URL::to('public')}}}/assets/pages/scripts/table-datatables-ajax.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{{URL::to('public')}}}/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
       
    </body>

</html>