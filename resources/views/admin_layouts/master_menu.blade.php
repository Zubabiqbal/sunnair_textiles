
<div id="hornav" class="bottom-border-shadow">
    <div class="container-fluid border-bottom">
        <div class="row">
            <div class="col-md-8 no-padding">
                <div class="visible-lg">
                    <ul id="hornavmenu" class="nav navbar-nav">
                        <li>
                            <a href='{{ url('admin/home') }}' class="fa-home">Home</a>
                        </li>
                        <li>
                            <span class="fa-arrow-left">Slider</span>
                            <ul>

                                <li>
                                    <a href="{{ url('admin/sliders/create') }}">New Slider Image</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/sliders/') }}">All</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href='{{ url('admin/category') }}' class="fa-gears">Categories</a>
                        </li>
                        <li>
                            <span class="fa-copy">Pages</span>
                            <ul>
                                @foreach($defaultPages as $page)
                                    <li>
                                        <a href="{{ url('admin/default-page/'.str_slug($page)) }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <span class="fa-font">Blog</span>
                            <ul>
                                <li>
                                    <a href="{{ url('admin/page/create') }}">New Blogs</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/page') }}">All blogs</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                               >
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 no-padding">
                @include('sample_layout.social')
            </div>
        </div>
    </div>
</div>