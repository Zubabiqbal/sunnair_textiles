<ul class="social-icons pull-right">
    @if(config('custom.social.twitter.enable'))
    <li class="social-twitter">
        <a href="{{ config('custom.social.twitter.link') }}" target="_blank" title="Twitter"></a>
    </li>
    @endif

        @if(config('custom.social.facebook.enable'))
    <li class="social-facebook">
        <a href="{{ config('custom.social.facebook.link') }}" target="_blank" title="Facebook"></a>
    </li>
        @endif

        @if(config('custom.social.google.enable'))
    <li class="social-googleplus">
        <a href="{{ config('custom.social.google.link') }}" target="_blank" title="Google+"></a>
    </li>
            @endif
</ul>