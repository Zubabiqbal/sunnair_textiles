<div class="recent-posts">
    <h3>Recent Posts</h3>
    <ul class="posts-list margin-top-10">
        @foreach($recents as $recent)
        <li>
            <div class="recent-post">
                <a href="">
                    <img class="pull-left" style="width: 64px; height: 54px" src="{{ $recent->getImagePath() }}" alt="thumb1">
                </a>
                <a href="#" class="posts-list-title">{{ $recent->title }}</a>
                <br>
                <span class="recent-post-date"> {{ $page->getHumanDate() }}</span>
            </div>
            <div class="clearfix"></div>
        </li>
        @endforeach
    </ul>
</div>