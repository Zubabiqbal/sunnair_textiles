@extends('admin_layouts.master')
@section('content')

    @if(count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <div class="">
        <div class="row">
                <form action="/admin/category/{{ $category->id }}" method="post">
                        <form action="/admin/category/" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{$category->title}}" required class="form-control" />
                                </div>
                              @if($category->isChild())
                                <div class="form-group">
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $cat)
                                            <option @if($cat->id == $category->parent_id)
                                                    selected
                                                    @endif
                                                    value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <input type="hidden" name="parent_id" value="{{ $category->parent_id }}"/>

                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-info {{ $category->status ? 'active' : '' }}">
                                                    <input checked="checked" type="radio" name="status" value="1">
                                                    Active
                                                </label>
                                                <label class="btn btn-info {{ !$category->status ? 'active' : '' }}">
                                                    <input type="radio" name="status" value="0"> In-active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
        </div>
    </div>
@endsection