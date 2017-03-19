    <a href='{{ url("admin/category/{$child->id}") }}' class="btn btn-primary">View</a>
    <a href='{{ url("admin/category/{$child->id}/edit") }}' class="btn btn-success">edit</a>
    <form action='{{ url("/admin/category/{$child->id}") }}' method="post" class="delete-form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <input type="submit" class="btn btn-danger" value="Delete" />
    </form>
    <form action='{{ url("/admin/category/{$child->id}/status") }}' method="post" class="delete-form-inline">
        {{csrf_field()}}
        {{method_field('put')}}
        <button type="submit" class="btn btn-info">
            {{!$child->status? "Activate" : 'Disable'}}
        </button>
    </form>