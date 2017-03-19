@extends('admin_layouts.master')
@section('content')
    @if(!count($images))
        <div class="row">
            <h3 class="text-danger text-center">No Slider Image Yet, Add please
                <a href='{{ url("admin/sliders/create") }}' class="btn btn-primary">ADD</a>

            </h3>
        </div>
    @endif
 @foreach($images  as $image)
     <div class="row well">
         <div class="col-md-6">
             <img src="{{$image->getImagePath()}}" class="img img-thumbnail">
         </div>
         <div class="col-md-6">{{$image->slogan}}</div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    <a href='{{ url("admin/sliders/{$image->id}") }}' class="btn btn-primary">View</a>
                    <a href='{{ url("admin/sliders/{$image->id}/edit") }}' class="btn btn-success">edit</a>
                    <form action='{{ url("admin/sliders/{$image->id}") }}' method="post" class="delete-form-inline">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                    <form action='{{ url("/admin/sliders/{$image->id}/status") }}' method="post" class="delete-form-inline">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <button type="submit" class="btn btn-info">
                            {{ !$image->status? "Activate" : 'Disable'}}
                        </button>
                    </form>
            </div>
        </div>
     </div>


 @endforeach
@endsection