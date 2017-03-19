@extends('admin_layouts.master')
@section('content')

    @include('admin.errors')
    @include('admin.alert')

    <div class="">
        @if($page->cover_image_path)
            <img class="img img-thumbnail" width="200px" height="200px" src="{{$page->getImagePath()}}">
            <form action='{{ url("admin/page/{$page->id}/remove-image") }}' method="post">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <button type="submit" class="btn btn-danger">Remove Image</button>
            </form>
        @endif
        <div class="row">
            <div class="col-md-12">
                <form action='{{ url("admin/page/$page->id") }}' method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="row margin-bottom-20">
                        <div class="col-md-7">
                            <label>Title</label>
                            <input {{ $page->isDefault() ? 'disabled=disabled' : '' }} required type="text" name="title" value="{{ $page->title }}" class="form-control" />
                            @if($page->isDefault())
                                <input type="hidden" name="title" value="{{$page->title}}" />
                                <input type="hidden" name="status" value="1" />
                            @endif
                        </div>
                        <div class="col-md-2">
                            <label>Image</label>
                            <input class="form-control" name="image" type="file">
                        </div>
                        {{--<div class="col-md-3 status-buttons">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info {{ $page->status ? 'active' : '' }}">
                                    <input checked="checked" type="radio" name="status" value="1">
                                    Active
                                </label>
                                <label class="btn btn-info {{ !$page->status ? 'active' : '' }}">
                                    <input type="radio" name="status" value="0"> In-active
                                </label>
                            </div>

                        </div>--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="body" id="editor" rows="50" cols="20">
                                    {!! $page->body !!}
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection