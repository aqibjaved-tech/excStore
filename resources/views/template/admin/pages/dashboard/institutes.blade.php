 @include('template/admin/includes/head')
        <!-- BEGIN HEADER -->
 @extends('template/admin/layouts/students')       
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
                    
                    <h3 class="page-title">Institutes List
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
                    <div class="alert alert-success">{{$success }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Institutes List</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                           
                                                <div class="btn-group">
                                                        <a class="btn green" href="/admin/addinstitutes">Add New</a>
                                                        
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> id </th>
                                                <th> Service User Name </th>
                                                <th>  Name </th>
                                                <th>  Type </th>
                                                <th>  Address </th>
                                                <th>  Website </th>
                                                <th>  Name </th>
                                                <th> Designation </th>
                                                <th> E-Mail </th>
                                                 <th> Phone </th>
                                                 
                                                <th> Action </th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($data['institutes'] as $institute)
                                              <tr>
                                                <td> {{{ $institute['institute_id'] }}}</td>
                                                <td> {{{ $institute['service_user_name'] }}}</td>
                                                <td> {{{ $institute['institute_name'] }}}</td>
                                                <td> {{{ $institute['institute_type'] }}}</td>
                                                <td> {{{ $institute['institute_address'] }}}</td>
                                                <td> {{{ $institute['website_url'] }}}</td>
                                                <td> {{{ $institute['primary_contact_name'] }}}</td>
                                                <td> {{{ $institute['primary_contact_title'] }}}</td>
                                                <td> {{{ $institute['primary_contact_email'] }}}</td>
                                                <td> {{{ $institute['primary_contact_phone'] }}}</td>
                                                
                                              <td>
                                                <a class="edit" href="/admin/editinstitutes/{{{ $institute['institute_id'] }}}"> Edit </a>
                                                <a class="delete" href="/admin/institute/delete/{{{ $institute['institute_id'] }}}"> Delete </a>
                                                </td> 
                                                       
                                                </tr>
                                             @endforeach
                                             </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
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