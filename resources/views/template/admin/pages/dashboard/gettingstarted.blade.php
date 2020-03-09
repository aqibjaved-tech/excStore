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
                              <h4 class="card-title">Getting Started</h4>
                          </div>
                          <div class="card-content">
                            <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg" allowfullscreen></iframe>
                            </div>
                            <br>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
          @include('template/admin/includes/footer')
    </div>
@stop
