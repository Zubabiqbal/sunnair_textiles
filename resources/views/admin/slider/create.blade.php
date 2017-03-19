@extends('admin_layouts.master')
@section('content')
@include('admin.errors')
@include('admin.alert')
    <div class="">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <form action="/admin/sliders/" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <label>Slider Image</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-6 col-md-offset-0">
                            <input required class="form-control" name="slider" type="file">
                            <p class="text-danger">image must be of dimensions width=1080,height=422</p>
                        </div>

                       @include('admin.status_buttons')
                    </div>
                    <label>Slogan</label>
                    <div class="row margin-bottom-20">
                        <div class="col-md-8 col-md-offset-0">
                            <textarea rows="8" name="slogan" class="form-control"></textarea>
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