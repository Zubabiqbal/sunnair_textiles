@extends('admin_layouts.master')
@section('content')
    @include('admin.alert')
    @include('admin.errors')
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <form action='{{ url("admin/page") }}' method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row margin-bottom-20">
                        <div class="col-md-7">
                        <label>Title</label>
                            <input required type="text" name="title" class="form-control" />
                        </div>
                        <div class="col-md-2">
                            <label>Image</label>
                            <input class="form-control" name="image" type="file">
                        </div>
                        <div class="col-md-3 status-buttons">
                            @include('admin.status_buttons')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Body</label>
                                <textarea name="body" id="editor" rows="50" cols="20"></textarea>
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