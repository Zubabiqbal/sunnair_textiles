@extends('admin_layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.categories.form')
        </div>
    </div>
    @include('admin.alert')
    @if(!count($categories))
        <h1>No Category Available, Add One first</h1>
    @endif
    @foreach($categories as $category)
        <div class="row">
            <hr/>
            <div class="col-md-12 well">
                <h1>{{$category->title}}</h1>
                <div class="text-right">
                    @include('admin.categories.crud_route_links')
                    <a href='{{ url("admin/category/{$category->id}/sub-category") }}' class="btn btn-success"><i class="fa fa-plus"></i> Sub Category</a>
                </div>
                <hr/>
                <h3>Sub Categories</h3>
                @foreach($category->children as $child)
                    <div>
                        <span class="help-block">{{$child->title}}</span>
                         <div class="text-right">
                             @include('admin.categories.child_crud_route_links')
                             <a href='{{ url("admin/category/{$child->id}/product/create") }}'
                                class="btn btn-success">
                                 <i class="fa fa-plus"></i> Add product
                             </a>
                         </div>
                        <div class="row padding-bottom-10 padding-top-10">
                            @if(!count($child->products))
                            <h3 class="text-danger text-center"> No Products</h3>
                            @endif
                            @foreach($child->products as $product)
                                <div class="col-md-3 margin-top-5">
                                    <a href={{ url("admin/category/{$product->category_id}/product/{$product->id}") }}>
                                        <img class="img img-thumbnail" width="200" height="200" src="{{$product->getImagePath()}}" />
                                    </a>
                                    <div class="margin-top-5">
                                        @include('admin.products.crud_links')
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    @if(count($categories))

        <div class="row">
            <div class="col-md-12 text-center">
                <div class="pagination">{{ $categories->links() }}</div>
            </div>
        </div>
    @endif
@endsection