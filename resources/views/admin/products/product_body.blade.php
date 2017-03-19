<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{$product->title}}
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a href='{{ url("admin/category/{$product->category_id}/product/{$product->id}/edit") }}' class="btn btn-success">Edit</a>
                @endif
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img class="img img-thumbnail" width="200" height="200" src="{{$product->getImagePath()}}" />
        </div>
    </div>
    <div class="row margin-10">
        <div class="col-md-12">
            <h3>About Product</h3>
            <section>
                {!! $product->description !!}
            </section>
        </div>
    </div>
</div>