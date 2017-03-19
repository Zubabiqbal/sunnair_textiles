@extends('admin_layouts.master')
@section('content')
        <div class="row well">
            <div class="col-md-12 text-center">
                <img src="{{ $image->getImagePath()}}" class="img img-responsive">
            </div>
        </div>
    <div class="row">
        <div class="col-md-4">{{$image->slogan}}</div>
        <div class="col-md-4">
            <a href="{{$image->id}}/edit" class="btn btn-success">edit</a>
            <form action="/admin/sliders/{{$image->id}}" method="post" class="delete-form-inline">
                {{csrf_field()}}
                {{method_field('delete')}}
                <input type="submit" class="btn btn-danger" value="Delete" />
            </form>
        </div>
    </div>
@endsection