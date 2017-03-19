
@if(Session::has('status'))
    <div class="alert alert-{{ (Session::get('status') == 'fail') ? 'danger' : 'success'  }}">
        {{ Session::get('message') }}
    </div>
@endif