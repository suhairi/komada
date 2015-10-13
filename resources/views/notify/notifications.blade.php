@if(Session::has('error'))

    <div class="alert alert-danger">
        <i class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></i>
        {{ Session::get('error') }}
    </div>
@endif

@if(Session::has('success'))

    <div class="alert alert-success">
        <i class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </div>
@endif