
<div class="row">
    <div class="col-md-12">
        <h1>{{$page->title}}
            @if(\Illuminate\Support\Facades\Auth::check())
            <a href='{{ url("admin/page/{$page->id}/edit") }}' class="btn btn-success">Edit</a>
            @endif
        </h1>
    </div>
</div>
@if($page->cover_image_path)
<div class="row">
    <div class="col-md-12">
        <img class="img img-thumbnail" width="200" height="200" src="{{$page->getImagePath()}}" />
    </div>
</div>
@endif
<div class="row margin-10">
    <div class="col-md-12">
        <section>
            {!! $page->body !!}
        </section>
    </div>
</div>