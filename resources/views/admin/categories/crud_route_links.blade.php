    <a href='{{ url("admin/category/{$category->id}") }}' class="btn btn-primary">View</a>
    <a href='{{ url("admin/category/{$category->id}/edit") }}'  class="btn btn-success">edit</a>
    <form action='{{ url("admin/category/{$category->id}") }}' method="post" class="delete-form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <input type="submit" class="btn btn-danger" value="Delete" />
    </form>
    <form action='{{ url("admin/category/{$category->id}/status") }}' method="post" class="delete-form-inline">
        {{csrf_field()}}
        {{method_field('put')}}
        <button type="submit" class="btn btn-info">
            {{!$category->status? "Activate" : 'Disable'}}
        </button>
    </form>