 @include('template/admin/includes/head')
        <!-- BEGIN HEADER -->
 @extends('template/admin/layouts/editstudents')       
      @section('content')  
      @include('template/admin/includes/header')
         



        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
           @include('template/admin/parts/sidebarmenu')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    
                    <h3 class="page-title"> Institutes List
                         <small>institutes list</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Institutes</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            
                        </ul>
                        
                    </div>
                    <!-- END PAGE HEADER-->
                   <?php  $success = Session::get('success'); ?>
                    @if (isset($success))
                    <div class="alert alert-info">{{$success }}</div>
                    @endif
<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Edit Institutes</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal"  action="{{{URL::to('')}}}/admin/updateinstitute" role="form" method="post">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button data-close="alert" class="close"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button data-close="alert" class="close"></button> Your form validation is successful! </div>
                                            <div class="form-group">
                                                
                                                <div class="col-md-4">
                                                    <input type="hidden" class="form-control"  name="institute_id" 
                                                    value="{{{$data['institutes'][0] ['institute_id']}}}"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Service User Name
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="service_user_name" value="{{{$data['institutes'][0] ['service_user_name']}}}"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Institute Name
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="institute_name" value="{{{$data['institutes'][0] ['institute_name']}}}">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Institute Type
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="institute_type" value="{{{$data['institutes'][0] ['institute_type']}}}"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Institute Address
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="institute_address" value="{{{$data['institutes'][0] ['institute_address']}}}"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Institute Website
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="institute_website" value="{{{$data['institutes'][0] ['website_url']}}}"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Contact Name
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="primary_contact_name" value="{{{$data['institutes'][0] ['primary_contact_name']}}}">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Contact Title
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="primary_contact_title" value="{{{$data['institutes'][0] ['primary_contact_title']}}}">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Contact Email
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="primary_contact_email" value="{{{$data['institutes'][0] ['primary_contact_email']}}}">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Contact Phone
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="primary_contact_phone" value="{{{$data['institutes'][0] ['primary_contact_phone']}}}">
                                                   
                                                </div>
                                            </div>
                                            
                                           
                                              
                                            
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button class="btn green" type="submit">Submit</button>
                                                     <a class="btn grey-salsa btn-outline"  onclick="window.history.go(-1); return false;">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
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

        @stop
@include('template/admin/includes/footer')