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
    @include('template/admin/includes/head-varify')
</head>
    <body class="login">
        <!-- BEGIN HEADER -->
        @yield('content')
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
       <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{{URL::to('public')}}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
         <script src="{{{URL::to('public')}}}/assets/pages/scripts/login.min.js" type="text/javascript"></script>
       
    </body>

</html>