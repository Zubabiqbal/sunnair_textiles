@include('admin.errors')
<div class="">
    <div class="row">
        @if(isset($category))
            <input type="hidden" name="parent_id" value="{{ $category->id }}"/>
            <form action="/admin/category/{{ $category->id }}/sub-category" method="post">
        @else
             <form action="/admin/category/" method="post">
        @endif
                        {{csrf_field()}}

                        @if(isset($category))
                            <input type="hidden" name="parent_id" value="{{ $category->id }}"/>
                        @endif

                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" required class="form-control" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       @include('admin.status_buttons')
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