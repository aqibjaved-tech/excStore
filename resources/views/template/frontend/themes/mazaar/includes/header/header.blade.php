<!-- Header ('header-dark' or 'header-light', 'header-sticky')-->
<header id="header" class="header header--sticky" data-header-hover="true">
    <!--Header Navigation-->
    <nav id="navigation" class="header-nav">
        <div class="container-fluid">
            <div class="row">
                <!--Logo-->
                <div class="site-logo">
                    <a href="{{url('/')}}">
                        <img src="{{asset('public/img/exchangecollective-logo.png')}}" class="logo-dark" alt="Mazaar" />
                        <img src="{{asset('public/img/exchangecollective-logo-dark.png')}}" class="logo-light" alt="Mazaar" />
                    </a>
                </div>
                <!--End Logo-->

                <!--Navigation Menu-->
                <div class="nav-menu">
                      <?php  ////print_r($data['categories']);?>
                    <ul>
                      @foreach($data['categories'] as $category)

                          <li class="nav-menu-item mega-menu">
                              <a href="#">{{$category['name']}}</a>
                              <div class="nav-dropdown mega-dropdown">
                                  <div class="container">
                                      <div class="row">
                                        <div class="col-lg-3">
                                          <ul>
                                            <?php $counter = 1;?>
                                                @foreach($category['associatedCategories'] as $associatedCategory)
                                                <?php if($counter%5 == 0){ ?>
                                                  </ul>
                                                  </div>
                                                  <div class="col-lg-3">
                                                    <ul>
                                                <?php } ?>
                                                  <li><a href="{{url(strtolower($associatedCategory)) }}"><span class="dropdown-title cout-{{$counter}}">{{$associatedCategory}}</span></a></li>
                                                  <?php $counter++; ?>
                                                  @endforeach
                                              </ul>
                                            </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      @endforeach
                    </ul>
                </div>
                <!--End Navigation Menu-->

                <!--Nav Icons-->
                <div class="nav-icons">
                    <ul>
                        <li class="nav-icon-item d-lg-none">
                            <div class="nav-icon-trigger menu-mobile-btn" title="Navigation Menu"><span><i class="ti-menu"></i></span></div>
                        </li>
                        <li class="nav-icon-item">
                            <div class="nav-icon-trigger search-menu-btn" title="Search"><span><i class="ti-search"></i></span></div>
                        </li>
                        
                        <li class="nav-icon-item d-none d-lg-table-cell">
                            <a class="nav-icon-trigger wishlist-sidebar-btn" title="Whishlist"><span><i class="ti-heart"></i>
                                    <span class="nav-icon-count"><?php echo $count_w; ?></span></span></a>
                        </li>
                        <li class="nav-icon-item">
                            <div class="nav-icon-trigger cart-sidebar-btn" title="Shopping Cart"><span><i class="ti-bag"></i>
                              <span class="nav-icon-count"><?php echo Session::get('cartquantify'); ?></span>
                            </span>
                            </div>
                        </li>
                        <li class="nav-icon-item">
                            <div class="nav-icon-trigger dropdown--trigger" title="User Account"><span><i class="ti-user"></i></span></div>
                            <!--Dropdown-->
                            <div class="dropdown--menu dropdown--right">
                                <ul>
                                    <li><a href="login_register.html">My Account</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Compare</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="#">Lost Password</a></li>
                                    <li>
                                        <hr />
                                    </li>
                                    <li><a href="#" class="btn btn--primary btn--sm btn--full"><i class="fa fa-shopping-cart"></i>Purchase Now</a></li>
                                </ul>
                            </div>
                            <!--End Dropdown-->
                        </li>
                    </ul>
                </div>
                <!--End Nav Icons-->

                <!--Search Bar-->
                <div class="searchbar-menu">
                    <div class="searchbar-menu-inner">
                        <!--Search Bar-->
                        <div class="search-form-wrap">
                            <form action="{{url('product-filter')}}" method="get">
                                <button class="search-icon btn--lg"><i class="ti-search"></i></button>
                                <input class="search-field input--lg" placeholder="Search here..." value="" name="s" title="Search..." type="search" autocomplete="off" />
                                <input type="hidden" name="type" value="header_search">
                                <span class="search-close-icon"><i class="ti-close"></i></span>
                                <!--<input type="submit" name="top_search">-->
                            </form>
                        </div>
                        <!--End Search Bar-->
                        <!--Search Result Bar-->
                        <div class="search-results-wrap">
                            <div class="search-results-loading">
                                <span class="fa fa-spinner fa-spin"></span>
                            </div>
                            <div class="search-results-text woocommerce">
                                <ul>
                                    <li>Nothing found</li>
                                </ul>
                            </div>
                        </div>
                        <!--End Search Result Bar-->
                    </div>
                </div>
                <!--End Search Bar-->
            </div>
        </div>
    </nav>
    <!--End Header Navigation-->
</header>
<!-- End Header -->
