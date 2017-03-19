@if($pages && count($pages) > 0)
    <div class="container background-white bottom-border animate fadeIn">
    <div class="row margin-vert-30">
        <div class="col-md-9">
            @foreach($pages as $page)
            <div class="blog-post padding-bottom-20">
                <!-- Blog Item Header -->
                <div class="blog-item-header">
                    <!-- Title -->
                    <h2>
                        <a href="{{ $page->getSinglePageLink() }}"> {{ $page->title }}</a>
                    </h2>
                    <div class="clearfix"></div>
                    <!-- End Title -->
                    <!-- Date -->
                    <div class="blog-post-date">
                        <a href="#">{{ $page->getHumanDate()}}</a>
                    </div>
                    <!-- End Date -->
                </div>
                <!-- End Blog Item Header -->
                <!-- Blog Item Body -->
                <div class="blog">
                    <div class="clearfix"></div>
                    <div class="blog-post-body row margin-top-15">
                        <div class="col-md-5">
                            <img class="margin-bottom-20" src="{{ $page->getImagePath() }}" alt="thumb1">
                        </div>
                        <div class="col-md-7">
                                {!! $page->body  !!}
                        </div>
                    </div>
                </div>
                <!-- End Blog Item Body -->
            </div>
            @endforeach

        </div>
        <div class="col-md-3">
           @include('sample_layout.recent_blogs')
        </div>
    </div>
    </div>
@endif