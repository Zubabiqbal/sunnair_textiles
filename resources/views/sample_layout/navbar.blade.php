<div id="hornav" class="bottom-border-shadow">
    <div class="container no-padding border-bottom">
        <div class="row">
            <div class="col-md-8 no-padding">
                <div class="visible-lg">
                    <ul id="hornavmenu" class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/') }}" class="fa-home">Home</a>
                        </li>
                        <li>
                            <span class="fa-th">Products</span>
                            <ul>
                               @foreach($categories as $category)
                                <li class="{{ count($category->children) ?  'parent' : ''}}">
                                    <span>{{ $category->title }}</span>
                                    @if(count($category->children))
                                        <ul>
                                            @foreach($category->children as $child)
                                                <li>
                                                    <a href="{{ ($child->products()->count())? url('/category-products/'.$child->id): '#' }}">{{ $child->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a class="fa-font" href="{{ url('/blog-list') }}">Blog</a>
                        </li>
                        @foreach($defaultPages as $page)
                            @if($page != 'introduction')
                            <li>
                                <a href="{{  url('/page/'.str_slug($page)) }}">{{ $page }}</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 no-padding">
                @include('sample_layout.social')
            </div>
        </div>
    </div>
</div>
  