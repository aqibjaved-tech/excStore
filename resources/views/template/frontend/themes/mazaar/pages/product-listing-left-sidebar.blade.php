@extends('template/frontend/themes/mazaar/layouts/default')
@section('content')
    @include('template/frontend/themes/mazaar/includes/newsletter-popup/newsletter-popup')
    @include('template/frontend/themes/mazaar/includes/sidebar-cart/sidebar-cart')
        @include('template/frontend/themes/mazaar/includes/sidebar-wishlist/sidebar-wishlist')

    <!-- Site Wraper -->
    <div class="site-wraper">
      @include('template/frontend/themes/mazaar/includes/topbar/topbar-03')
      @include('template/frontend/themes/mazaar/includes/header/header', ['data' => $data])

        <!--Page Body Content -->
        <div class="page-contaiter">
            @include('template/frontend/themes/mazaar/modules/hero-banner-with-breadcrumb',['data' => $data])
            <!--Product Content-->
            <section class="sec-padding--md">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-12 order-lg-2">
                            <!--Product Filter-->
                            <div class="product-filter-content">
                                <div class="product-filter-content-inner">
                                    <!--Product Showing Text-->
                                    <p>Showing <?php echo  $products['paginate']['page_size'];?> of <?php  echo $products['paginate']['totalItems']; ?> Results</p>

                                    <!--Product Ouder By-->
                                    <form class="ordering">
                                        <select name="orderby" class="orderby">
                                            <option value="menu_order" selected="selected">Default Sorting</option>
                                            <option value="popularity">Sort by Popularity</option>
                                            <option value="rating">Sort by Average rating</option>
                                            <option value="date">Sort by Newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </form>

                                    <!-- Product Filter -->
                                    <div class="product-select-filter">
                                        <a href="javascript:void(0);" class="filter-menu-btn btn btn--gray"><i class="ti-filter left"></i>Filter</a>
                                        <!--Filter Dropdown Menu-->
                                        <div class="filterbar-dropdown-menu">
                                            <div class="filterbar-dropdown-inner">
                                                <h4 class="widget-title">Filter</h4>
                                                <span class="filter-close-icon"><i class="ti-close"></i></span>
                                                <form action="<?php echo url('product-filter')?>" method="get">
                                                    <div class="form-field-wrapper">
                                                        <label>Categories</label>
                                                        <select name="filter_categries" class="form-full">
                                                            <option value="">Select a Category</option>
                                                            @foreach($data['categories'] as $categoryf)

                                                                <option value="{{$categoryf['name']}}">{{$categoryf['name']}}</option>
                                                            @endforeach

                                                        </select>
                                                        <input type="hidden" value="search" name="type">
                                                    </div>
                                                    <div class="form-field-wrapper">
                                                        <label>Color</label>
                                                        <select name="filter_color" class="form-full">
                                                            <option value="">Any Color</option>
                                                            @foreach($products['filters']['colors'] as $color)
                                                                <option value="{{$color}}">{{$color}}</option>
                                                            @endforeach>
                                                        </select>
                                                    </div>
                                                    <div class="form-field-wrapper">
                                                        <label>Size</label>
                                                        <select name="filter_size" class="form-full">
                                                            <option value="">Any Size</option>
                                                            <option value="large">Large</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="small">Small</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-field-wrapper">
                                                        <label>Price</label>
                                                        <div class="price-range-slider"></div>
                                                        <div class="price-range-amount">
                                                            <input class="price_range_min" name="price_range_min" value="" data-min="140" placeholder="Min price" style="display: none;" type="text">
                                                            <input class="price_range_max" name="price_range_max" value="" data-max="1100" placeholder="Max price" style="display: none;" type="text">
                                                            <div class="price-range-from-to"></div>
                                                        </div>
                                                        <button class="btn btn--secondary btn--full">Filter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--End Filter Dropdown Menu-->
                                    </div>
                                    <!--Product List/Grid view-->
                                    <div class="product-view-switcher">
                                        <label class="d-none"></label>
                                        <div class="product-view-icon product-grid-switcher product-view-icon-active">
                                            <a href="javascript:void(0);"><i class="fa ti-layout-grid2" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="product-view-icon product-list-switcher">
                                            <a href="javascript:void(0);"><i class="fa ti-view-list-alt" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Product Filter-->
                            <!--Product Items-->
                            <div class="row product-list-item">
                              <?php ////print_r($products['paginate']['totalItems']); ?>
                              @foreach($products['products'] as $product)

                                    <div class="product-item-element col-sm-6 col-md-6 col-lg-4">
                                          <div class="product-item">
                                              <!--Product Img-->
                                              <div class="product-item-img">
                                                  <!--Image-->
                                                <?php
                                                   if($category == ''){?>
                                                     <a class="product-item-img-link" href="{{ url($brandname.'/'.strtolower(str_replace('/', '_', $product['name']).'/'.$product['id'])) }}">
                                                  <?php }else{ ?>
                                                    <a class="product-item-img-link" href="{{ url($category.'/'.strtolower(str_replace('/', '_', $product['name']).'/'.$product['id'])) }}">
                                                   <?php } ?>

                                                  <!-- <a class="product-item-img-link" href=""> -->
                                                      <img src="{{(isset($product['largeThumbnails'][0]) ? $product['largeThumbnails'][0] : asset('assets/mazaar/img/banner/body_banner04.jpg') )}}" alt="Product Item" />
                                                  </a>
                                                  <!--Add to Link-->
                                                  <div class="add-to-link">
                                                    <?php
                                                       if($category == ''){?>
                                                         <a class="btn btn--primary btn--sm" href="{{ url($brandname.'/'.strtolower(str_replace('/', '_', $product['name']).'/'.$product['id'])) }}">
                                                      <?php }else{ ?>
                                                        <a class="btn btn--primary btn--sm" href="{{url($category.'/'.strtolower(str_replace('/', '_', $product['name']).'/'.$product['id'])) }}">

                                                       <?php } ?>
                                                      View Details</a>
                                                  </div>
                                                  <!--Hover Icons-->
                                                  <div class="hover-product-icon">
                                                      <div class="product-icon-btn-wrap">
                                                          <a href="#" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                                                          <a href="#" class="product-add-to-whishlist" data-toggle="tooltip" id="{{$product['id']}}" data-placement="left" title="Add to Whishlist"><i class="ti-heart"></i></a>
                                                          <a href="#" data-toggle="tooltip" data-placement="left" title="Add to Compare"><i class="ti-reload"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!--Product Content-->
                                              <div class="product-item-content">
                                                  <div class="tag"><a href="#">Minimal</a></div>
                                                  <a href="product_detail.html" class="product-item-title"><span>{{$product['name']}}</span></a>
                                                  <p class="product-item-price">
                                                      <span class="product-price-amount">
                                                          <span class="product-price-currency-symbol">$</span>{{$product['retailPrice']}}
                                                      </span>
                                                  </p>
                                                  <div class="product-rating">
                                                      <div class="star-rating" title="Rated 4 out of 5">
                                                          <span style="width: 60%"></span>
                                                      </div>
                                                      <a href="#" class="product-rating-count"><span class="count">3</span> Reviews</a>
                                                  </div>
                                                  <p class="product-description">
                                                      When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                              @endforeach
                            </div>
                            <!--End Product Items-->
                            <!--Paginattion-->
                            <div class="pagination-wraper">
                                <div class="pagination">
                                    <ul class="pagination-numbers">
                                        <!--<li>
                                            <a href="#" class="prev page-number"><i class="fa fa-angle-double-left"></i></a>
                                        </li>-->
                                        <?php
                                      ////print_r($products['paginate']);

                                        if (isset($_GET['p']) && $_GET['p']!="") {
                                        $page_no = $_GET['p'];
                                        } else {
                                            $page_no = 1;
                                        }
                                        $total_records_per_page = $products['paginate']['page_size'];

                                        $offset = ($page_no-1) * $total_records_per_page;
                                        $previous_page = $page_no - 1;
                                        $next_page = $page_no + 1;
                                        $adjacents = "2";
                                        $total_no_of_pages = ceil($products['paginate']['totalItems'] / $total_records_per_page);
                                        $second_last = $total_no_of_pages - 1; // total pages minus 1
                                        ?>



                                        <ul class="pagination">
                                          <?php
                                          //  if($page_no > 1){
                                          // echo "<li><a href='?page_no=1'>First Page</a></li>";
                                          // }
                                          ?>

                                          <li
                                          <?php
                                          if($page_no <= 1){ echo "class='disabled'"; }
                                          ?>>
                                          <a <?php if($page_no > 1){
                                          echo "href='?p=$previous_page'";
                                          } ?>>Previous</a>
                                          </li>

                                          <?php
                                          if ($total_no_of_pages <= 10){
                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                              if ($counter == $page_no) {
                                               echo "<li><a class='page-number current'>$counter</a></li>";
                                                }else{
                                                   echo "<li><a class='page-number' href='?p=$counter'>$counter</a></li>";
                                                }
                                                }
                                          }
                                          elseif($total_no_of_pages > 10){

                                          if($page_no <= 4) {
                                           for ($counter = 1; $counter < 8; $counter++){
                                              if ($counter == $page_no) {
                                               echo "<li><a class='page-number current'>$counter</a></li>";
                                                }else{
                                                   echo "<li><a class='page-number' href='?p=$counter'>$counter</a></li>";
                                                }
                                                }
                                            echo "<li><a>...</a></li>";
                                            echo "<li><a href='?p=$second_last'>$second_last</a></li>";
                                            echo "<li><a href='?p=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                            }

                                           elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                            echo "<li><a href='?p=1'>1</a></li>";
                                            echo "<li><a href='?p=2'>2</a></li>";
                                                echo "<li><a>...</a></li>";
                                                for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                                   if ($counter == $page_no) {
                                               echo "<li><a class='page-number current'>$counter</a></li>";
                                                }else{
                                                   echo "<li><a class='page-number' href='?p=$counter'>$counter</a></li>";
                                                }
                                               }
                                               echo "<li><a>...</a></li>";
                                             echo "<li><a href='?p=$second_last'>$second_last</a></li>";
                                             echo "<li><a href='?p=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                                    }

                                            else {
                                                echo "<li><a href='?p=1'>1</a></li>";
                                            echo "<li><a href='?p=2'>2</a></li>";
                                                echo "<li><a>...</a></li>";

                                                for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                                  if ($counter == $page_no) {
                                               echo "<li><a class='page-number current'>$counter</a></li>";
                                                }else{
                                                   echo "<li><a class='page-number' href='?p=$counter'>$counter</a></li>";
                                                }
                                                        }
                                                    }
                                          }
                                          ?>
                                          <li <?php if($page_no >= $total_no_of_pages){
                                              echo "class='disabled'";
                                              } ?>>
                                              <a <?php if($page_no < $total_no_of_pages) {
                                              echo "href='?p=$next_page'";
                                              } ?>>Next</a>
                                              </li>
                                          <?php if($page_no < $total_no_of_pages){
                                          echo "<li><a href='?p=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                                          } ?>
                                          </ul>

                                        <!-- <li>
                                            <a href="#" class="page-number current">1</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-number">2</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-number">3</a>
                                        </li>
                                        <li>
                                            <span class="page-number dots">...</span>
                                        </li>
                                        <li>
                                            <a href="#" class="page-number">29</a>
                                        </li>
                                        <li>
                                            <a href="#" class="next page-number"><i class="fa fa-angle-double-right"></i></a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <!--End Paginattion-->
                        </div>
                        <div class="col-lg-3 col-12 order-lg-1 sidebar-container">
                            <aside class="widget-area">
                              @include('template/frontend/themes/mazaar/modules/product-category-widget', ['data' => $data])
                              {{-- @include('template/frontend/themes/mazaar/modules/product-filter-price-widget') --}}
                              @include('template/frontend/themes/mazaar/modules/product-filter-color-widget', ['products' => $products])
{{--                              @include('template/frontend/themes/mazaar/modules/product-filter-size-widget')--}}
                              {{--  @include('template/frontend/themes/mazaar/modules/product-top-rated-widget') --}}
                              {{-- @include('template/frontend/themes/mazaar/modules/product-banner-widget') --}}
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Product Content-->
        </div>
        <!--End Page Body Content -->

        @include('template/frontend/themes/mazaar/includes/footer/footer')
    </div>
    <!-- Site Wraper End -->
@stop
