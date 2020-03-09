            <!--Widget-->
            <div class="widget">
                <!--Title-->
                <h4 class="widget-title">Shop Categories</h4>
                <!--End Title-->
                <!-- Content -->
                <div class="widget-content widget_nav_menu">
                    <ul class="menu">
                      @foreach($data['categories'] as $category)
                        <li class="menu-item"><a href="#">{{$category['name']}}</a>
                            <ul class="sub-menu">
{{--                                <li class="menu-item"><a href="#">New In</a>--}}
{{--                                    <ul class="sub-menu">--}}
                                      @foreach($category['associatedCategories'] as $associatedCategory)
                                      <li class="menu-item"><a href="/<?php echo strtolower($associatedCategory) ?>">{{$associatedCategory}}</a></li>
                                      @endforeach
{{--                                    </ul>--}}
{{--                                </li>--}}
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- End Content -->
            </div>
            <!--End Widget-->
