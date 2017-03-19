@extends('admin_layouts.master')
@section('content')

    @include('admin.errors')
    @include('admin.alert');
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action='{{ url("admin/category/{$category->id}/product") }}' method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row margin-bottom-20">
                        <div class="col-md-7">
                        <label>Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <div class="col-md-2">
                            <label>Image</label>
                            <input required class="form-control" name="image" type="file">
                            <p class="text-danger">File size must be width : 644, height : 420</p>

                        </div>
                        <div class="col-md-3 status-buttons">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input checked="checked" type="radio" name="status" value="1">
                                    Active
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="status" value="0"> In-active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="editor" rows="50" cols="20"></textarea>
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