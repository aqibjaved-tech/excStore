@extends('template/frontend/themes/mazaar/layouts/default')
@section('content')
    @include('template/frontend/themes/mazaar/includes/newsletter-popup/newsletter-popup')
    @include('template/frontend/themes/mazaar/includes/sidebar-cart/sidebar-cart')
    <div class="site-wraper">
    @include('template/frontend/themes/mazaar/includes/topbar/topbar')
    @include('template/frontend/themes/mazaar/includes/header/header', ['data' => $data])
    <div class="page-contaiter">
          @include('template/frontend/themes/mazaar/modules/hero-banner-with-breadcrumb',['data' => $data])
          <!--Portfolio-->
          <section class="sec-padding portfolio-page">
              <div class="container">
                  <div class="row portfolio-grid">
                      <!--Grid Sizer-->
                      <!--Item-->
                      <?php ////print_r($data['brands']); ?>
                      @foreach($data['brands'] as $brand)
                      <div class="portfolio-item-grid col-lg-3 col-md-6">
                          <div class="portfolio-box">

                            <a class="portfolio-thumb" href="{{ route('brand_name', [strtolower($brand['name'])]) }}">
                                  <img src="{{$brand['logo']}}" alt="portfolio Item" />
                              </a>
                              <div class="portfolio-item-content">
                                  <h5 class="portfolio-title"><a href="#">{{$brand['name']}}</a></h5>
                              </div>
                          </div>
                      </div>
                      <!--Item-->
                      @endforeach

                  </div>
              </div>
          </section>
          <!--End Portfolio-->

    </div>
    @include('template/frontend/themes/mazaar/includes/footer/footer')
   </div>
@stop
