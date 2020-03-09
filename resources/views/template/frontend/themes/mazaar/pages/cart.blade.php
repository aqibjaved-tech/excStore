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
            @include('template/frontend/themes/mazaar/modules/hero-banner-with-breadcrumb',['data' => $data])
            <!--Content-->

            <section class="sec-padding--md">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                          <input type="hidden" name="cartid" id="cartid" value="{{Session::get('cartid')}}" />
                            <?php
// echo count($final_data).'---';
                              if(count($final_data) > 0) {?>
                            <article>
                                <form class="cart-form" method="post" action="{{url('cart')}}">
                                  @csrf
                                  <div class="cart-product-table-wrap responsive-table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-remove"></th>
                                                    <th class="product-thumbnail"></th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-qty">Quantity</th>
                                                    <th class="product-subtotal">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $subtotal = 0;
                                             // echo '<pre>';
                                             //   //print_r($final_data); exit;
                                             foreach ($final_data['id'] as $key=>$final_value)
                                             {
                                                   // echo $final_data['name'][$key].'<br>';

                                                    ?>
                                                   <tr>
                                                    <td class="product-remove">
                                                        <input type="hidden" value="<?php echo $key; ?>" name="pid[]">
                                                        <input type="hidden" value="<?php echo Session::get('cartid'); ?>" name="cart_id[]">
                                                        <input type="hidden" value="<?php echo $final_value; ?>" name="rowid[]">
                                                          <input type="hidden" value="<?php echo $final_data['name'][$key]; ?>" name="product_name[]">

                                                        <a href="{{url('/removeproduct/'.$final_value)}}">
                                                          <i class="fa fa-times-circle" aria-hidden="true" rowid="<?php echo $final_value; ?>" pid="<?php echo $key; ?>" cartid="<?php echo Session::get('cartid'); ?>"></i>
                                                        </a>
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <a>
                                                            <img src="<?php echo $final_data['thumbnails'][$key]; ?>" alt="<?php echo $final_data['name'][$key]; ?>">
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a href="#"><?php echo $final_data['name'][$key]; ?></a>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="product-price-amount amount"><span class="currency-sign">$</span><?php echo $final_data['retailPrice'][$key]; ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="product-quantity">
                                                            <input type="hidden" id="<?php echo $final_value; ?>" name="new_quantity[]" value="<?php echo $final_data['product_qty'][$key]; ?>">
                                                            <span data-value="+" class="quantity-btn quantityMinus" data-value="-"><i onclick="removeQuantity(<?php echo $final_value; ?>)" class="ti-minus"></i></span>
                                                            <input class="quantity input-lg"  name="quantity" min="1" id="prod_<?php echo $final_value; ?>" value="<?php echo $final_data['product_qty'][$key]; ?>" title="Quantity" type="number">
                                                            <span data-value="-" class="quantity-btn quantityPlus" data-value="+"><i onclick="addQuantity(<?php echo $final_value; ?>)" class="ti-plus"></i></span>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="product-price-sub_totle amount"><span class="currency-sign">$</span><?php echo $rowvalue = $final_data['product_qty'][$key] * $final_data['retailPrice'][$key]; ?></span>
                                                    </td>
                                                </tr>
                                            <?php
                                                  $subtotal = $rowvalue + $subtotal;
                                          } ?>

                                                <tr>
                                                    <td colspan="6">
                                                        <!-- <div class="coupon">
                                                            <input name="coupon_code" class="input-lg" id="coupon_code" value="" placeholder="Coupon code" type="text">
                                                            <button type="submit" class="btn btn-lg btn-secondary" name="apply_coupon" value="Apply Coupon">Apply Coupon</button>
                                                        </div> -->
                                                        <input type="submit" value="Update Cart" class="update-cart btn btn--lg btn--secondary">
                                                        <!-- <button type="button" id="updatecart" class="update-cart btn btn-lg btn-secondary" name="update_cart" value="Update Cart" >Update Cart</button> -->

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <div class="cart-collaterals">
                                    <div class="cart_totals">
                                        <h3>Cart Totals</h3>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th data-title="Subtotal">Subtotal</th>
                                                    <td><span class="price-amount amount"><span class="currencySymbol">$</span><?php echo $subtotal;  ?></span></td>
                                                </tr>
                                                <tr>
                                                    <th data-title="Shipping">Shipping</th>
                                                    <td>
                                                        <ul id="shipping_method">
                                                            <!-- <li>
                                                                <input name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate2" value="flat_rate:2" checked="checked" type="radio">
                                                                <label for="shipping_method_0_flat_rate2">Flat rate: <span class="price-amount amount"><span class="currencySymbol">$</span>10.00</span></label>
                                                            </li>
                                                            <li>
                                                                <input name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping3" value="free_shipping:3" class="shipping_method" type="radio">
                                                                <label for="shipping_method_0_free_shipping3">Free shipping</label>
                                                            </li> -->
                                                            <li>
                                                                <!-- <input name="shipping_method[0]" data-index="0" id="shipping_method_0_local_pickup4" value="local_pickup:4" class="shipping_method" type="radio"> -->
                                                                <!-- <label for="shipping_method_0_local_pickup4">Local pickup: <span class="price-amount amount"><span class="currencySymbol">£</span>0.00</span></label> -->

                                                                <label for="shipping_method_0_local_pickup4"><span class="price-amount amount"><span class="currencySymbol">$</span>0.00</span></label>

                                                            </li>
                                                        </ul>
                                                        <!-- <form>
                                                            <a href="javascript:void(0)">Calculate Shipping</a>
                                                        </form> -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td><span class="price-amount amount"><span class="currencySymbol">$</span><?php echo $subtotal  ?></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="proceed-to-checkout">
                                            <!-- <form method="get"> -->
                                              <p class="form-field-wrapper">
                                                  <label for="billing_email">Email Address  &nbsp;<abbr class="required" title="required">*</abbr></label>
                                                  <input class="form-full input--lg" required name="shipping_email" id="shipping_email" title="" value="" placeholder=""  type="email" />
                                              </p>
                                            <a class="checkout-button btn btn--lg btn--primary full-width">Proceed to Checkout</a>

                                            <!-- <a href="/checkout" class=" checkout-button btn btn-lg btn-primary full-width">Proceed to Checkout</a> -->

                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                            </article>
                          <?php
                        //$cart_id = $cart_data[0]['id'];
                        }else {
                            echo "<h3>Your cart is empty!</h3>";
                          } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Content-->
        </div>

        <!--End Page Body Content -->

        @include('template/frontend/themes/mazaar/includes/footer/footer')
        <script type="text/javascript">

      //  var cartid = "<?php //echo $cart_id ?>";
      //  localStorage.setItem('cartid', cartid);

        jQuery(".checkout-button").click(function(e){
            e.preventDefault();
            var cartid = localStorage.getItem('cartid');
            // localStorage.setItem('cartid', cartid);


            var shipping_email = jQuery("input[name=shipping_email]").val();
            // if($(shipping_email)
            $('input[name=shipping_email]').filter(function(){
                if ($.trim(this.value).length == 0){
                    isShake = 1;
                    $(this).css("border","1px solid red");
                    return false;
                }else{
                  jQuery.ajax({
                    type:'post',
                    url:'{{url('checkoutdata')}}',
                    data:{_token:"{!! csrf_token() !!}",shipping_email:shipping_email,cartid:cartid},
                    success:function(data){
                      ///alert(data.success);
                      setTimeout(function(){
                        window.location.href = "{{url('checkout')}}";
                      }, 400);
                      // jQuery(".alert-success").fadeTo(2000, 1500).slideUp(500, function(){
                      //   jQuery(".alert-success").slideUp(500);
                      //
                      //  });
                    }
                  });
                }
            });
        });


        function addQuantity(id) {
          setTimeout(function(){
            console.log(jQuery("#prod_"+id).val());
            jQuery("#"+id).val(jQuery("#prod_"+id).val());

          }, 200);
        }
        function removeQuantity(id) {
          setTimeout(function(){
            console.log(jQuery("#prod_"+id).val());
            jQuery("#"+id).val(jQuery("#prod_"+id).val());

          }, 200);
        }

        jQuery("i.fa.fa-times-circle.delete").click(function(e){
          e.preventDefault();
          // var product_qty = jQuery("input[name=quantity]").val();
          var product_id = $(this).attr('pid');
          var cart_id = $(this).attr('cartid');
          var rowid = $(this).attr('rowid');
                  // alert('productid: '+ product_id + ', cartid: '+ cart_id + ', rowid: '+rowid);
                  //  var product_id = jQuery("input[name=pid").val();
          jQuery.ajax({
            type:'POST',
            url:'{{url('/removeproduct')}}',
            data:{_token:"{!! csrf_token() !!}" ,rowid:rowid,cart_id:cart_id},
            success:function(data){
              location.reload();
            //  alert(data.success);
              // setTimeout(function(){
              //   //location.reload();
              // }, 1000);
              // jQuery(".alert-success").fadeTo(2000, 1500).slideUp(500, function(){
              //   jQuery(".alert-success").slideUp(500);
              //
              //  });
            }
          });
          // setTimeout(function(){
          //   jQuery.ajax({
          //     type:'POST',
          //     url:'/removeproduct',
          //     data:{_token:"{!! csrf_token() !!}" ,product_id:product_id},
          //     success:function(data){
          //       ///alert(data.success);
          //       jQuery(".alert-success").fadeTo(2000, 1500).slideUp(500, function(){
          //         jQuery(".alert-success").slideUp(500);
          //
          //        });
          //     }
          //   });
          //   jQuery.ajax({
          //     type:'POST',
          //     url:'/removeproduct',
          //     data:{_token:"{!! csrf_token() !!}" ,product_id:product_id},
          //     success:function(data){
          //       ///alert(data.success);
          //       jQuery(".alert-success").fadeTo(2000, 1500).slideUp(500, function(){
          //         jQuery(".alert-success").slideUp(500);
          //
          //        });
          //     }
          //   });
          // }, 1000);

	       });


          //jQuery('#updatecart').on('click', function(e) {
          //jQuery("#updatecart").click(function(e){
          // e.preventDefault();
          // var product_qty = jQuery("#newqty_").val();
          // var product_id = jQuery("input[name=pid]").val();
          //alert(product_qty);
        //  return false;

          // jQuery.ajax({
          //   type:'POST',
          //   url:'/updatecart',
          //   data:{_token:"{!! csrf_token() !!}" ,product_id:product_id,product_qty:product_qty},
          //   success:function(data){
          //     ///alert(data.success);
          //     location.reload();
          //     jQuery(".alert-success").fadeTo(2000, 1500).slideUp(500, function(){
          //       jQuery(".alert-success").slideUp(500);
          //       // setTimeout(function(){
          //       //     jQuery(".nav-icon-count").text("<?php //echo $totalItemsincart; ?>");
          //       //  }, 1500);
          //      });
          //   }
          // });
	       //});
       </script>
    </div>
    <!-- Site Wraper End -->
@stop
