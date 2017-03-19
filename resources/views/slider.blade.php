@if(count($images) > 0)
    <div id="carousel-example-1" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1" data-slide-to="1"></li>
            <li data-target="#carousel-example-1" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($images as $image)
                <div class="item {{( $image->id == $images[0]->id) ? 'active' : ''}}" ><img src="{{$image->getImagePath()}}"></div>
            @endforeach
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-1" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-1" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
@endif
    