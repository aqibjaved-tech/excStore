@extends('template/admin/layouts/default')
     @section('content')
     @include('template/admin/parts/sidebarmenu', ['data' => $data]);
     <div class="main-panel">
     @include('template/admin/includes/header')
          <div class="content">
            <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Our FAQ</h4>
                          </div>
                          <div class="card-content">
                          <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
                          </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
          @include('template/admin/includes/footer')
    </div>
@stop
