@extends('admin_layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-right">
                @include('admin.categories.crud_route_links')
                @if(!$category->isChild())
                    <a href='{{ url("admin/category/{$category->id}/sub-category") }}' class="btn btn-success"><i class="fa fa-plus"></i> Sub Category</a>
                @endif

            </div>
            <h1>
                {{$category->title}}
               </h1>
            @if(!$category->isChild() && count($category->children))
                <h3>Sub Categories</h3>
                @foreach($category->children as $child)
                    <div>
                        <span class="help-block">{{$child->title}}</span>
                        <div class="text-right">
                            @include('admin.categories.child_crud_route_links')
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection