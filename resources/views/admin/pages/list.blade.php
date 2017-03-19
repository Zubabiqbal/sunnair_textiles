@extends('admin_layouts.master')
@section('content')
    @include('admin.alert')
    <div class="row">
        <div class=" col-md-12 text-right">
            <a class="btn btn-lg btn-success" href={{ url("admin/page/create") }}>
                <i class="fa fa-plus"></i>
            </a>
        <hr/>
        </div>
    </div>
    <div class="row">
        <h1>Active Pages</h1>
        @if(!count($activePages))
            <h2 class="text-info text-center"> NO Active Pages</h2>
        @endif
        @foreach($activePages as $page)
            <div class="col-md-6 text-center margin-top-10">
                <a href={{ url("admin/page/slug")."/".str_slug($page->title) }}>
                    <div>
                        {{str_limit($page->title,30,'...')}}
                    </div>
                </a>
            </div>
            <div class="col-md-6 margin-top-10">
                    @include('admin.pages.crud_links')
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="pagination">{{$activePages->links()}}</div>
        </div>
    </div>

    <h1>In Active Pages</h1>

    @if(!count($inActivePages))
        <h2 class="text-info text-center"> NO InActive Pages</h2>
    @endif
    <div class="row">
        @foreach($inActivePages as $page)
            <div class="col-md-6 text-center margin-top-10">
                <a href={{ url("admin/page/slug")."/".str_slug($page->title) }}>
                @if($page->cover_image_path)
                        <img class="img img-thumbnail" width="200" height="200" src="{{$page->getImagePath()}}" />
                    @endif
                    <div>
                        {{str_limit($page->title,30,'...')}}
                    </div>
                </a>
            </div>
            <div class="col-md-6 margin-top-10">
                @include('admin.pages.crud_links')
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="pagination">{{$inActivePages->links()}}</div>
        </div>
    </div>


@endsection

