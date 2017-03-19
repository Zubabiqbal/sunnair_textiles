<div id="base">
    <div class="container bottom-border padding-vert-30">
        <div class="row">
            <!-- Disclaimer -->
            @if(config('custom.disclaimer_message'))
            <div class="col-md-4">
                <h3 class="class margin-bottom-10">Disclaimer</h3>
                <p>{{ config('custom.disclaimer_message') }}</p>
            </div>
            @endif
            <!-- End Disclaimer -->
            <!-- Contact Details -->
            <div class="col-md-4 margin-bottom-20">
                <h3 class="margin-bottom-10">Contact Details</h3>
                <p>
                    <span class="fa-phone">Telephone:</span>{{ config('custom.phone') }}
                    <br>
                    <span class="fa-envelope">Email:</span>
                    <a href="mailto:{{config('custom.email')}}">{{ config('custom.email') }}</a>
                    <br>
                    <span class="fa-link">Website:</span>
                    <a href="{{config('custom.website')}}">{{  config('custom.website') }}</a>
                </p>
                <p>
                    <address>{{ config('custom.address') }}</address>
                </p>
            </div>
            <!-- End Contact Details -->
        </div>
    </div>
</div>