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
                                  <h4 class="card-title">Navigation Pills -
                                      <small>Horizontal Tabs</small>
                                  </h4>
                              </div>
                              <div class="card-content">
                                  <ul class="nav nav-pills nav-pills-rose">
                                      <li class="active">
                                          <a href="#pill1" data-toggle="tab" aria-expanded="true">Profile</a>
                                      </li>
                                      <li class="">
                                          <a href="#pill2" data-toggle="tab" aria-expanded="false">Settings</a>
                                      </li>
                                      <li class="">
                                          <a href="#pill3" data-toggle="tab" aria-expanded="false">Options</a>
                                      </li>
                                  </ul>
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="pill1">
                                      <img src="{{@$data->accountInfo->logo}}"  style="width: 25%; display: block; margin-bottom: 10px;">
                                      <span><b>Company Name:</b></span>    {{@$data->accountInfo->companyName}} <br>
                                      <span><b>Email:</b></span>   {{@$data->accountInfo->email}}<br>
                                      <span><b>Brand Name:</b></span>   {{@$data->accountInfo->brandName}}<br>
                                      <span><b>Store Name:</b></span>   {{@$data->accountInfo->storeName}}<br>
                                      <span><b>First Name:</b></span>   {{@$data->accountInfo->firstName}}<br>
                                      <span><b>Last Name:</b></span>   {{@$data->accountInfo->lastName}}<br>
                                      <span><b>Account Type:</b></span>   {{@$data->accountInfo->account_type_id}}<br>

                                      </div>
                                      <div class="tab-pane" id="pill2">
                                          Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                          <br>
                                          <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                      </div>
                                      <div class="tab-pane" id="pill3">
                                          Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                          <br>
                                          <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                                      </div>
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
