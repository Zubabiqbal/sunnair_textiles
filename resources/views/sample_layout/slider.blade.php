<div id="slideshow" class="bottom-border-shadow">
    <div class="container no-padding background-white bottom-border">
        <div class="row">
            <!-- Carousel Slideshow -->
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Carousel Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example" data-slide-to="1"></li>
                    <li data-target="#carousel-example" data-slide-to="2"></li>
                </ol>
                <div class="clearfix"></div>
                <!-- End Carousel Indicators -->
                <!-- Carousel Images -->
                <div class="carousel-inner">
                    @foreach($images as $image)
                        <div class="item {{( $image->id == $images[0]->id) ? 'active' : ''}}" ><img src="{{$image->getImagePath()}}"></div>
                    @endforeach
                </div>
                <!-- End Carousel Images -->
                <!-- Carousel Controls -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <!-- End Carousel Controls -->
            </div>
            <!-- End Carousel Slideshow -->
        </div>
    </div>
</div>
   