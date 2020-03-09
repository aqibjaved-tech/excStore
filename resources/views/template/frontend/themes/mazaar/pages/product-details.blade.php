@extends('template/frontend/themes/mazaar/layouts/default')
@section('content')
    @include('template/frontend/themes/mazaar/includes/newsletter-popup/newsletter-popup')
    @include('template/frontend/themes/mazaar/includes/sidebar-cart/sidebar-cart')
        @include('template/frontend/themes/mazaar/includes/sidebar-wishlist/sidebar-wishlist')

    <!-- Site Wraper -->
    <div class="site-wraper">
      @include('template/frontend/themes/mazaar/includes/topbar/topbar')
      @include('template/frontend/themes/mazaar/includes/header/header', ['data' => $data])

        <!--Page Body Content -->
        <div class="page-contaiter">
            @include('template/frontend/themes/mazaar/modules/hero-banner-with-breadcrumb',['data' => $data,'bannerimg' => $bannerimg])
            <!--Product Content-->
            <section class="sec-padding--md">
                <!-- Product -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 align-self-center">

                            @if (Session::has('success'))
                              <div class="alert alert-success alert-dismissible" role="alert" >
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              Success! <strong>"{{$product['name']}}"</strong> has been added to your Cart! <a style="float: right;" href="{{ url('/cart') }}">View Cart</a>
                            </div>
                              @endif

                          </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="product-page-gallery">
                                <div class="product-gallery-media mfp-gallery-popup">
                                    <div class="product-media-slider">
                                      <?php ////print_r(88990);
                                        // //print_r($product);
                                        // die();
                                       ?>
                                      @foreach($product['largeThumbnails'] as $product_gallery_image)
                                      <div class="product-gallery-image mfp-gallery-popup-link" data-mfp-src="{{$product_gallery_image}}">
                                          <img src="{{$product_gallery_image}}" alt="mazaar">
                                      </div>
                                       @endforeach
                                     </div>
                                </div>
                                <div class="product-gallery-media-thumb">
                                    <div class="product-media-thumb-slider">
                                      @foreach($product['thumbnails'] as $product_thumbnails)
                                      <a class="product-gallery-image">
                                          <img src="{{$product_thumbnails}}" alt="mazaar">
                                      </a>
                                      @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="product-page-content">
                                <!--Brand Name-->
                                <!--<div class="tag brand-name"><a href="#">Mazaar</a></div>-->
                                <!--Product Title-->
                                <h4 class="product-item-title">{{$product['brand']['name']}}</h4>
                                <h3 class="product-item-title">{{$product['name']}}</h3>
                                <!--Product Ratting-->
                                <div class="product-rating">
                                    <div class="star-rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 4 out of 5">
                                        <span style="width: 60%"></span>
                                    </div>
                                    <a href="#" class="product-rating-count"><span class="count">3</span> Reviews</a>
                                </div>
                                <!--Product Price-->
                                <p class="product-item-price">
                                    <span class="product-price-amount">
                                        <!-- <del>
                                            <span class="product-price-currency-symbol">$</span>59.99
                                        </del> -->
                                        <ins>
                                            <span class="product-price-currency-symbol">$</span>{{$product['retailPrice']}}
                                        </ins>
                                    </span>
                                </p>
                                <!--Product Description-->
                                <!-- <div class="product-description">
                                    <p>
                                        When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. who seeks after it and wants to have it, simply because it is pain.
                                    </p>
                                </div> -->
                                <!--Product Variations Form-->
                                <form class="product-variations-form" autocomplete="off">
                                    {{ csrf_field() }}
                                    <!--Select Color-->
                                    <input type="hidden" name="pid" value="{{$product['id']}}" />
                                    <input type="hidden" name="pname" value="{{$product['name']}}" />
                                    <input type="hidden" name="price" value="{{$product['retailPrice']}}" />
                                    <input type="hidden" name="cartid" id="cartid" value="{{Session::get('cartid')}}" />
                                    {{--  <input type="hidden" name="brandname" value="{{$brandname}}" />  --}}



                                    <div class="product-variations-child">
                                        <label>Color</label>
                                        <div class="product-color-choose">
                                            <div>
                                                <input data-image="black" type="radio" id="black" name="color" value="black" checked />
                                                <label for="black"><span style="background-color: #333333;"></span></label>
                                            </div>
                                            <div>
                                                <input data-image="blue" type="radio" id="blue" name="color" value="blue" />
                                                <label for="blue"><span style="background-color: #7eabe9;"></span></label>
                                            </div>
                                            <div>
                                                <input data-image="orange" type="radio" id="orange" name="color" value="orange" />
                                                <label for="orange"><span style="background-color: #f27123;"></span></label>
                                            </div>
                                            <div>
                                                <input data-image="gray" type="radio" id="gray" name="color" value="gray" />
                                                <label for="gray"><span style="background-color: #d1d1d1;"></span></label>
                                            </div>
                                            <div>
                                                <input data-image="green" type="radio" id="green" name="color" value="green" />
                                                <label for="green"><span style="background-color: #27af9a;"></span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Select Size-->
                                    <div class="product-variations-child">
                                        <label>Size</label>
                                        <div class="product-select-size">
                                          @foreach($product['variants'] as $variants)

                                            <label for="size_{{$variants['size']}}">
                                                <input type="checkbox" id="size_{{$variants['size']}}" name="size" value="xs" />
                                                {{$variants['size']}}
                                                <input type="hidden"  id="size_{{$variants['quantityAvailable']}}" name="variaint_quantity" value="xs" />
                                            </label>
                                            @endforeach
                                          </div>
                                        <a class="product-size-guide mfp-link-popup" href="img/size-chart.png"><i class="fa fa-question-circle left"></i>Size guide</a>
                                    </div>

                                    <!--Quantity and Adda to cart-->
                                    <div class="product-variations-child">
                                        <label>Qty</label>
                                        <div id="quantity_1234" class="product-quantity">
                                            <span data-value="-" class="quantity-btn quantityMinus"><i class="ti-minus"></i></span>
                                            <input class="quantity input--lg" id="qty" step="1" min="1" max="9" name="quantity" value="1" title="Quantity" type="number">
                                            <span data-value="+" class="quantity-btn quantityPlus"><i class="ti-plus"></i></span>
                                        </div>
                                        <button type="button" name="add-to-cart" value="add_to_cart" class="single_add_to_cart_button btn btn--primary">Add to Cart</button>
                                    </div>

                                </form>

                                <!--Product Add to Button Links-->
                                <div class="product-add-to-button">
                                    <a class="product-add-to-whishlist" id="{{$product['id']}}" href=""><i class="ti-heart left"></i>Add to Wishlist</a>
                                    <a class="product-add-to-whishlist" href="#"><i class="ti-reload left"></i>Add to Compare</a>
                                </div>

                                <!--Product Meta-->
                                <div class="product-meta">
                                    <span>Sku:<span>{{$product['itemNumber']}}</span>
                                    </span>
                                    <span>Categories:
                                        @if(isset($product['category']))
                                            <?php
                                            // echo $product['category']."-----"; exit;

                                            if(is_array($product['category'])){
                                            $numItems = count($product['category']);
                                            $i = 0;
                                            if($numItems > 0){
                                            foreach ($product['category'] as $category) {?>
                                            <a href="#"><?php echo $category; ?></a>
                                        <?php if(++$i === $numItems) {
                                        }else{
                                            echo ',';
                                        }
                                        }
                                        }
                                        }else{
                                            echo (isset($product['category']) ? $product['category'] : $categroy);
                                        }
                                        ?>
                                            @else
                                            {{$category}}
                                        @endif

                                      <!-- <a href="#">Accessories</a>,,<a href="#">Man</a> -->
                                    </span>
                                    <!-- <span>Tags:<a href="#">Man</a>,<a href="#">Cap</a>,<a href="#">Shirt</a>,<a href="#">Gray</a>
                                    </span> -->
                                </div>

                                <!--Product Share-->
                                <div class="product-share">
                                    <span>Share:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://nileforest.com/" target="_blank"><i class="fa fa-facebook left" aria-hidden="true"></i>Facebook</a>
                                    <a href="http://twitter.com/share?url=http://nileforest.com/" target="_blank"><i class="fa fa-twitter left" aria-hidden="true"></i>Twitter</a>
                                    <a href="http://pinterest.com/pin/create/button/?url=http://nileforest.com/exampleImage.jpg" target="_blank"><i class="fa fa-pinterest-p left" aria-hidden="true"></i>Pinterest</a>
                                    <a href="http://plus.google.com/share?url=http://nileforest.com/" target="_blank"><i class="fa fa-google-plus left" aria-hidden="true"></i>plus</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Product -->

                <!--Product Tabs-->
                <div class="container">
                    <div class="product-tabs-wrapper">
                        <!--Tabs-->
                        <ul class="product-tabs-nav nav" role="tablist">
                            <li>
                                <a class="active" href="#tab_description" role="tab" data-toggle="tab" aria-expanded="false">Description</a>
                            </li>
                            <li>
                                <a class="" href="#tab_information" role="tab" data-toggle="tab" aria-expanded="true">Additional information</a>
                            </li>
                            <li>
                                <a class="" href="#tab_reviews" role="tab" data-toggle="tab">Materials</a>
                            </li>

                            <li>
                                <a class="" href="#tab_custom" role="tab" data-toggle="tab">Specs</a>
                            </li>
                        </ul>
                        <!--End Tabs-->

                        <!--Tabs Content-->
                        <div id="product-accordian-Content" class="product-Content-tabs">
                            <!--Description-->
                            <div id="tab_description" role="tabpanel" class="tab-pane fade show active">

                                <!--Header-->
                                <div id="accrodianOne" class="product-Content-toggle">
                                    <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Description</a>
                                </div>

                                <!--Body-->
                                <div id="collapseOne" class="product-tab-Content-body collapse show" aria-labelledby="accrodianOne" data-parent="#product-accordian-Content">
                                    <?php
                                      foreach ($product['properties'] as $properties) {
                                        ////print_r($properties);
                                          if (strpos($properties['key'], 'Description') !== false)
                                          {
                                               echo ($properties['value'][0]);
                                          }
                                        // code...
                                      }
                                     ?>

                                </div>
                            </div>

                            <!--Additional information-->
                            <div id="tab_information" role="tabpanel" class="tab-pane fade">

                                <!--Header-->
                                <div id="accrodianTwo" class="product-Content-toggle">
                                    <a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Additional information</a>
                                </div>

                                <!--Body-->
                                <div id="collapseTwo" class="product-tab-Content-body collapse" aria-labelledby="accrodianTwo" data-parent="#product-accordian-Content">
                                    <div class="detail-table">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th>Color</th>
                                                    <td>Black, Blue, Orange, Gray, White, Green</td>
                                                </tr>
                                                <tr>
                                                    <th>Size</th>
                                                    <td>XS, Small, Large, Mediam, Small, XL, XXL</td>
                                                </tr>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td>5 kg</td>
                                                </tr>
                                                <tr>
                                                    <th>Dimensions</th>
                                                    <td>60 x 40 x 60 cm</td>
                                                </tr>
                                                <tr>
                                                    <th>Washcare</th>
                                                    <td>Dry Clean</td>
                                                </tr>
                                                <tr>
                                                    <th>Composition</th>
                                                    <td>100% Polyester</td>
                                                </tr>
                                                <tr>
                                                    <th>Lining composition</th>
                                                    <td>Polyester</td>
                                                </tr>
                                                <tr>
                                                    <th>Other info</th>
                                                    <td>Ullamcorper nisl mus integer mollis vestibulu</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!--Reviews -->
                            <div id="tab_reviews" role="tabpanel" class="tab-pane fade">



                                <!--Body-->
                                <div id="collapseThree" class="product-tab-Content-body collapse" aria-labelledby="accrodianThree" data-parent="#product-accordian-Content">
                                    <div class="row">
                                      <p>
                                      <?php
                                        foreach ($product['properties'] as $properties) {
                                          ////print_r($properties);
                                            if (strpos($properties['key'], 'Materials') !== false)
                                            {
                                                 echo ($properties['value'][0]);
                                            }
                                          // code...
                                        }
                                       ?>
                                     </p>

                                    </div>
                                </div>
                            </div>

                            <!--Custom Tab-->
                            <div id="tab_custom" role="tabpanel" class="tab-pane fade">

                                <!--Header-->
                                <div id="accrodianFour" class="product-Content-toggle">
                                    <a data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Specs</a>
                                </div>

                                <!--Body-->
                                <div id="collapseFour" class="product-tab-Content-body collapse" aria-labelledby="accrodianFour" data-parent="#product-accordian-Content">

                                    <?php
                                      foreach ($product['properties'] as $properties) {
                                        ////print_r($properties);
                                          if (strpos($properties['key'], 'Specs') !== false)
                                          {
                                               echo ($properties['value'][0]);
                                          }
                                        // code...
                                      }
                                     ?>
                                </div>
                            </div>
                        </div>
                        <!--End Tabs Content-->
                    </div>
                </div>
                <!--End Product Tabs-->


            </section>
            <!--End Product Content-->
        </div>
        <!--End Page Body Content -->

        @include('template/frontend/themes/mazaar/includes/footer/footer')
        <?php
        $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $productdata =  json_encode($product);
        //echo $productdata;

        //$totalItemsincart = $data =  \Cart::session(1)->getTotalQuantity();
        ?>
        <script type="text/javascript">
        // jQuery(window).load(function() {
        //       console.log( "ready!" );
        //       jQuery(".alert-success").fadeTo(2000, 1500).slideUp(500, function(){
        //       setTimeout(function(){
        //         jQuery(".alert-success").slideUp(500);
        //       }, 2500);
        //       });
        //   });
        jQuery(".single_add_to_cart_button").click(function(e){
          e.preventDefault();
          var cartvalue = $('#cartid').val();
            // alert(cartvalue);
          var cartid = localStorage.getItem('cartid');
            // alert(cartid);
          if(!cartid){
            // alert(cartid+'Empty');
            jQuery.ajax({
              type:'get',
              url:'<?php echo url('/getcartid'); ?>',
              success:function(data){
                localStorage.setItem('cartid', data);
                var myJSON = JSON.stringify(<?php echo $productdata; ?>);
                //var newjson = myJSON.NewField = 'foo';
                var product_data = JSON.parse(myJSON);
                var product_qty = jQuery("input[name=quantity]").val();
                product_data.product_qty=product_qty;
                product_data.cartid=cartid;
                //console.log("adeel ki ahooo",JSON.stringify(product_data));
                var finaldata = JSON.stringify(product_data);
                // alert(finaldata);
                jQuery.ajax({
                  type:'POST',
                  url:'<?php  echo $actual_link; ?>',
                  data:{_token:"{!! csrf_token() !!}",cartid:data,item:finaldata},
                  success:function(data){
                  location.reload();
                  }
                });
              }
            });
          }
        else {
            // var cartid = localStorage.getItem('cartid');
            // alert(cartid+'hello');
            var myJSON = JSON.stringify(<?php echo $productdata; ?>);
            //var newjson = myJSON.NewField = 'foo';
            var product_data = JSON.parse(myJSON);
            var product_qty = jQuery("input[name=quantity]").val();
            product_data.product_qty=product_qty;
            product_data.cartid=cartid;
            var finaldata = JSON.stringify(product_data);
            // alert(finaldata);
            jQuery.ajax({
              type:'POST',
              url:'<?php  echo $actual_link; ?>',
              data:{_token:"{!! csrf_token() !!}",cartid:cartid,item:finaldata},
              success:function(data){
                location.reload();

                //localStorage.setItem('myDataKey', someData);
                  //alert(data);

              }
            });
          }



	      });
       </script>
    </div>
    <!-- Site Wraper End -->
@stop
