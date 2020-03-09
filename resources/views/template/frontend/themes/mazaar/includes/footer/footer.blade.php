        <!--Footer-->
        <footer class="footer bg--dark">
            <!--Footer Widget Bar-->
            <section class="footer-widget-area">
                <div class="container">
                    <div class="row">
                        <div class="footer-widget col-lg-3 col-12 mb-lg-0 mb-4 pr-lg-4">
                            <img class="footer-logo mb-4" src="{{asset('public/assets/mazaar/img/logo--light.png')}}" alt="Mullar">
                            <p>Mazaar is a Mulltipurpose Ecommerce Template, The spread of computers and layout programmes thus made dummy text better known.</p>
                            <ul>
                                <li><i class="fa fa-phone"></i><span>+42 (0) 123 456 7890</span></li>
                                <li><i class="fa fa-envelope-open"></i><span>sales@mazaar.com</span></li>
                            </ul>
                        </div>
                        <div class="footer-widget col-sm-4 col-md-4 col-lg-2 col-12 mb-lg-0 mb-4">
                            <h6 class="footer-widget-title">Information</h6>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">My account</a></li>
                                <li><a href="#">Wishlist</a></li>
                            </ul>
                        </div>
                        <div class="footer-widget col-sm-4 col-md-4 col-lg-2 col-12 mb-lg-0 mb-4">
                            <h6 class="footer-widget-title">Usefull Links</h6>
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Shipping Information</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                                <li><a href="{{url('cart')}}">Cart</a></li>
                                <li><a href="{{url('checkout')}}">Checkout</a></li>
                                <li><a href="#">My account</a></li>
                                <li><a href="#">Order Tracking</a></li>
                            </ul>
                        </div>
                        <div class="footer-widget col-sm-4 col-md-4 col-lg-2 col-12 mb-lg-0 mb-4">
                            <h6 class="footer-widget-title">Our Link</h6>
                            <ul>
                                @if($js)
                                    @foreach($js as $page)
                                        <li><a href="{{url('page/'.$page->site.'/'.$page->id)}}">{{$page->title}}</a></li>
                                    @endforeach
                                    @endif
{{--                                <li><a href="#">Men</a></li>--}}
{{--                                <li><a href="#">Women</a></li>--}}
{{--                                <li><a href="#">Fashion</a></li>--}}
{{--                                <li><a href="#">Contact us</a></li>--}}
{{--                                <li><a href="#">Brand</a></li>--}}
{{--                                <li><a href="#">Accessories</a></li>--}}
{{--                                <li><a href="#">Beauty</a></li>--}}
                            </ul>
                        </div>
                        <div class="footer-widget col-lg-3 col-12 mb-lg-0 mb-3">
                            <h6 class="footer-widget-title">Signup for Newsletter</h6>
                            <form class="pt-2">
                                <p>Sign up for our newsletter to get the latest news, announcements and special</p>
                                <div class="form-field-wrapper">
                                    <input class="newsletter-input form-full" placeholder="Email Address" type="email">
                                    <button class="newsletter-btn btn btn--primary" type="submit">Go</button>
                                </div>
                            </form>
                            <ul class="social">
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!--Footer Copyright Bar-->
            <section class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-left">
                            <p class="footer-copyright">© 2018 Mazaar Shop, Template by <a href="http://nileforest.com/" target="_blank">Nileforest</a></p>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <img src="{{asset('public/assets/mazaar/img/payment_logos.png')}}" alt="payment logos" />
                        </div>
                    </div>
                </div>
            </section>
        </footer>
        <!--End Footer-->
        <!-- JS -->
        <script src="{{asset('public/assets/mazaar/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/modernizr.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/jquery.easing.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/jquery.parallax.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/jquery.cookie.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/owl.carousel.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/slick.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/jquery.countdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/isotope.pkgd.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/instafeed.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/sticky-sidebar.js')}}" type="text/javascript"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyDwxfea8ecYMmGKMO39JF1ko5bhF4UocpM" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/plugins/jquery.gmap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/assets/mazaar/js/theme.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
          jQuery("span.cart-product-item-close").click(function(e){
              var product_id  =  jQuery("span.cart-product-item-close").attr('datapid');
              var product_qty = jQuery(".cart-product-content input[name=quantity]").val();
              //console.log(product_qty);
              jQuery.ajax({
                type:'POST',
                url:'/removeproduct',
                data:{_token:"{!! csrf_token() !!}" ,product_id:product_id},
                success:function(data){
                  ///alert(data.success);
                  setTimeout(function(){
                    location.reload();
                  }, 1000);
                  jQuery(".alert-success").fadeTo(2000, 1500).slideUp(500, function(){
                    jQuery(".alert-success").slideUp(500);

                   });
                }
              });
          });
        </script>
