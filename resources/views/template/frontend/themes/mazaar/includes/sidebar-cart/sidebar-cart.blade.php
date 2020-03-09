    <!-- Cart Sidebar Menu -->
    <div class="cart-sidebar-menu">
        <div class="cart-sidebar-wrap hheh">
            <!--Cart sidebar Header-->

            <div class="cart-sidebar-header">
                <h4 class="cart-sidebar-title">Shopping Cart</h4>
                <span class="close-cart-sidebar"><i class="ti-close"></i></span>
            </div>
            <!--Cart sidebar Content-->
            <?php if(count($final_data) > 0) {?>
            <div class="cart-sidebar-content">
                <ul class="cart-widget-product">
                    <!--Item-->
                    <?php
                    $subtotal = 0;
                   // echo '<pre>';
                   //   //print_r($final_data); exit;
                   foreach ($final_data['id'] as $key=>$final_value)
                   {
                         // echo $final_data['name'][$key].'<br>';

                          ?>
                        <li class="cart-product-item">
                            <a class="cart-product-image" href="#">
                                <img src="<?php echo $final_data['thumbnails'][$key]; ?>" alt="<?php echo $final_data['name'][$key]; ?>" />
                            </a>
                            <div class="cart-product-content">
                              <input type="hidden" value="{{$final_value}}" name="pid">
                              <input type="hidden" value="{{$final_data['product_qty'][$key]}}" name="quantity">
                                <a class="cart-product-link" href="#"> {{ $final_data['name'][$key] }}</a>
                                <span class="cart-product-quantity">{{$final_data['product_qty'][$key]}} × <span class="cart-product-amount">${{$final_data['retailPrice'][$key]}}</span></span>
                                <span class="cart-product-item-close" datapid="{{$final_value}}"><a href="{{url('/removeproduct/'.$final_value)}}"><i class="ti-close"></i></a></span>
                            </div>
                        </li>
                      <?php
                      $rowvalue = $final_data['product_qty'][$key] * $final_data['retailPrice'][$key];
                      $subtotal = $rowvalue + $subtotal;
                     } ?>

                      <!-- Item-->

                </ul>
                <!--Cart sidebar Footer-->
                <div class="cart-widget-footer">
                    <div class="cart-footer-inner">
                        <h5 class="cart-total-hedding">
                            <span>Subtotal:</span>
                            <span class="amount"><span class="currencySymbol">$</span><?php echo $subtotal;  ?>.00</span>
                        </h5>
                        <div class="cart-buttons">
                            <a href="{{url('cart')}}" class="btn btn--gray">View Cart</a>
                            <a href="{{url('checkout')}}" class="btn btn--primary">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
           <?php } else{
              echo "<div class='cart-sidebar-content'>Cart is empty</div>";
          }  ?>

        </div>
    </div>
    <!-- End Cart Sidebar Menu -->

    <!-- Shop Overlay -->
    <div class="shop-overlay"></div>
    <!-- End Shop Overlay -->
