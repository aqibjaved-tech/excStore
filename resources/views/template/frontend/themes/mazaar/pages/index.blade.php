@extends('template/frontend/themes/mazaar/layouts/default')

@section('content')
    @include('template/frontend/themes/mazaar/includes/newsletter-popup/newsletter-popup')
    @include('template/frontend/themes/mazaar/includes/sidebar-cart/sidebar-cart')
        @include('template/frontend/themes/mazaar/includes/sidebar-wishlist/sidebar-wishlist')

    <div class="site-wraper">
    @include('template/frontend/themes/mazaar/includes/topbar/topbar')
    @include('template/frontend/themes/mazaar/includes/header/header', ['data' => $data])
    <div class="page-contaiter">
          @include('template/frontend/themes/mazaar/modules/hero-slider')
          @include('template/frontend/themes/mazaar/modules/category')
          @include('template/frontend/themes/mazaar/modules/products-with-slider',['products'=>$products])
          @include('template/frontend/themes/mazaar/modules/deal-counter')
          @include('template/frontend/themes/mazaar/modules/products')
          @include('template/frontend/themes/mazaar/modules/testimonials')
          @include('template/frontend/themes/mazaar/modules/blog-slider')
          @include('template/frontend/themes/mazaar/modules/brand-logo-slider')
    </div>
    @include('template/frontend/themes/mazaar/includes/footer/footer')
   </div>
@stop
