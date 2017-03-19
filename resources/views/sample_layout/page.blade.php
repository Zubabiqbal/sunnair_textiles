<div class="bottom-border-shadow">
    <div class="container background-white animate fadeIn">
        @include('admin.pages.page_body')
        @if($page->isDefault() && str_slug($page->title) == 'contact-us' && ! \Illuminate\Support\Facades\Auth::check())
                @include('sample_layout.contact_us')
        @endif
    </div>
</div>
