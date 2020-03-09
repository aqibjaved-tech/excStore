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
                    
                    <h3 class="page-title"> Students List
                         <small>students list</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Students</a>
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
                                        <span class="caption-subject font-red sbold uppercase">Add Student</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal"  action="{{{URL::to('')}}}/admin/addstudent" role="form" method="post">
                                        <div class="form-body">
                                            <div class="alert alert-danger display-hide">
                                                <button data-close="alert" class="close"></button> You have some form errors. Please check below. </div>
                                            <div class="alert alert-success display-hide">
                                                <button data-close="alert" class="close"></button> Your form validation is successful! </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Student Master id
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="student_master_id" > </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">First Name
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="student_first_name">
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Last Name
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="student_last_name" > </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                  
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="student_email" > </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Phone
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="student_phone" >
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Subscription Start Date
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="subscription_start_date" >
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Subscription End Date
                                                   
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="subscription_end_date" >
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Status</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="student_subscription_active_flag" >
                                                    
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label col-md-3">Institutes</label>
                                                <div class="col-md-4">
                                                <select class="form-control" name="institute_id" id="institute_id">
                                                <option value="">Select Institute</option>  
                                                @foreach($data['institutes'] as $institutes) 
                                                <option value="{{{ $institutes['institute_id']}}}">{{{ $institutes['institute_name']}}}</option>       
                                                @endforeach
                                                </select>
                                                </div>
                                                </div>

                                                <div class="form-group">
                                                <label class="control-label col-md-3"> Instructors</label>
                                                <div class="col-md-4">
                                                <select class="form-control" name="instructor_id" id="instructor_id">
                                                <option value="">Select Instructor</option>  
                                                <!-- @foreach($data['instructors'] as $instructors) 
                                                <option value="{{{ $instructors['instructor_id']}}}">{{{ $instructors['instructor_fname'] .' '.$instructors['instructor_lname']}}}</option>       
                                                @endforeach -->
                                                </select>
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
<script type="text/javascript">
  jQuery( document ).ready(function() {
    
    var baseUrl = document.location.origin;

    jQuery('select#institute_id').change(function() {
            var institute_id = $(this).val();
                 jQuery.ajax({
                    type: 'post',
                    url: baseUrl+'/admin/ajax',
                    data: {
                        Imgname: institute_id
                    },
                    success: function( data ) {
                                jQuery("#instructor_id").html("");
                                //console.log(data);
                           jQuery.each(data,function(i,d){
							   
                               jQuery('#instructor_id').append(
                                jQuery('<option/>', {
                                   value: d.instructor_id,
                                   text: d.instructor_fname+ " "+d.instructor_lname
                                })
                                );
                          });
                               
                    }
                });
    
    });
});







</script>
