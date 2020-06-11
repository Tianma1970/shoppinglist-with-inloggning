@if(session('status'))

<div class="alert alert-success col-12">
    {{ session('status') }}
</div>

@endif
