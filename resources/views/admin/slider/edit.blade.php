@extends('admin_layouts.master')
@section('content')

    @include('admin.errors')
    @include('admin.alert')

    <div class="row well">
        <div class="col-md-12 text-center">
            <img src="{{ $image->getImagePath()}}" class="img img-responsive">
        </div>
    </div>

    <form action="/admin/sliders/{{$image->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('put')}}
        <label>Slider Image</label>
        <div class="row margin-bottom-20">
            <div class="col-md-6 col-md-offset-0">
                <input class="form-control" name="slider" type="file">
                <p class="text-danger">image must be of dimensions width=1080,height=422</p>

            </div>
            <div class="col-md-6 status-buttons">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-info {{ $image->status ? 'active' : '' }}">
                            <input checked="checked" type="radio" name="status" value="1">
                            Active
                        </label>
                        <label class="btn btn-info {{ !$image->status ? 'active' : '' }}">
                            <input type="radio" name="status" value="0"> In-active
                        </label>
                    </div>

                </div>

        </div>
        <label>Slogan</label>
        <div class="row margin-bottom-20">
            <div class="col-md-8 col-md-offset-0">
                <textarea rows="8" name="slogan" class="form-control">{{$image->slogan}}</textarea>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">save</button>
            </div>

        </div>
    </form>
@endsection