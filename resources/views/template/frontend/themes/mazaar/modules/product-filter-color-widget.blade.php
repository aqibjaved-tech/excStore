            <div class="widget">
                <h4 class="widget-title">Filter by Color</h4>
                <div class="widget-content">
                    <ul>
                      @foreach($products['filters']['colors'] as $color)
                      <li><a href="{{url('product-filter?type=color&filter='.$color)}}">{{$color}}</a></li>
                      @endforeach
                      </ul>
                </div>
            </div>
