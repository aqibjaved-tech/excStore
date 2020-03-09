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
                                        <span class="caption-subject font-red sbold uppercase">Terms and Conditions</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                           
                                                <div class="btn-group">
                                                        <a class="btn green" href="/admin/addtermsconditions">Add New</a>
                                                        
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>
                                                <th> id </th>
                                                <th> TC Number </th>
                                                <th> Terms and Conditions </th>
                                                
                                                 <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php  foreach($data['termsconditions'] as $termscondition) {?>
                                              <tr>
                                                <td> <?php echo  $termscondition['id']; ?>   </td>
                                                <td> <?php echo  $termscondition['tcnumber']; ?></td>
                                                <td> <?php 


                                        
                                           echo $str = substr($termscondition['tctext'], 0, 300) .'...';
                                       
                                           



                                                      ?> </td>
                                                <td>
                                                <a class="edit" href="/admin/edittermsconditions/{{{ $termscondition['id'] }}}"> Edit </a>
                                              
                                                </td>
                                                       
                                                </tr>
                                            <?php } ?>
                                             </tbody>
                                    </table>
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