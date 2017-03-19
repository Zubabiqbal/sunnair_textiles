<a href='{{ url("admin/page/{$page->id}/edit") }}'  class="btn btn-success">edit</a>
@if(!$page->isDefault())
<form action='{{ url("admin/page/{$page->id}") }}' method="post" class="delete-form-inline">
    {{csrf_field()}}
    {{method_field('delete')}}
    <input type="submit" class="btn btn-danger" value="Delete" />
</form>
<form action='{{ url("admin/page/{$page->id}/status") }}' method="post" class="delete-form-inline">
    {{csrf_field()}}
    {{method_field('put')}}
    <button type="submit" class="btn btn-info">
        {{!$page->status? "Activate" : 'Disable'}}
    </button>
</form>
@endif