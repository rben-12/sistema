@if (Session::has('infob'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
    {{Session::get('infob')}}
</div>
@endif