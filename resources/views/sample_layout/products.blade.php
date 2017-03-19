
<div id="portfolio" class="bottom-border-shadow">
    <div class="container bottom-border">
        <div class="row padding-top-40">
            <ul class="portfolio-group">
                <!-- Portfolio Item -->
                @foreach($products as $product)
                    <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                        <a href="{{ url('/product/'.$product->id) }}">
                            <figure class="animate {{ ['fadeInLeft', 'fadeIn', 'fadeInRight'][random_int(0,2)] }}">
                                <img alt="image1" src="{{ $product->getImagePath() }}">
                                <figcaption>
                                    <h3>{{ $product->title }}</h3>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>