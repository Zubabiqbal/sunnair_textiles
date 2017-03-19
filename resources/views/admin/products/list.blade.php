@extends('admin_layouts.master')
@section('content')
    <div class="row">
        <div class=" col-md-12 text-right">
            <a class="btn btn-lg btn-success" href={{ url("admin/category/{$category->id}/product/create") }}>
                <i class="fa fa-plus"></i>
            </a>
        <hr/>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 text-center margin-top-10">
                <a href={{ url("admin/category/{$product->category_id}/product/{$product->id}") }}>
                    <img class="img img-thumbnail" width="200" height="200" src="{{$product->getImagePath()}}" />
                    <div>
                        {{str_limit($product->title,30,'...')}}
                    </div>
                    <div>
                        @include('admin.products.crud_links')
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection