<a href='{{ url("admin/category/{$product->category_id}/product/{$product->id}/edit") }}'  class="btn btn-success">edit</a>
<form action='{{ url("admin/category/{$product->category_id}/product/{$product->id}") }}' method="post" class="delete-form-inline">
    {{csrf_field()}}
    {{method_field('delete')}}
    <input type="submit" class="btn btn-danger" value="Delete" />
</form>
<form action='{{ url("admin/category/{$product->category_id}/product/{$product->id}/status") }}' method="post" class="delete-form-inline">
    {{csrf_field()}}
    {{method_field('put')}}
    <button type="submit" class="btn btn-info">
        {{!$product->status? "Activate" : 'Disable'}}
    </button>
</form>