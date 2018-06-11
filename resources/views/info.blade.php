@if (Session::has('info'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
    {{Session::get('info')}}
</div>
@endif