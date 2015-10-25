@if(Session::has('error'))

    <div class="alert alert-danger">
        <i class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></i>
        {{ Session::get('error') }}

        @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
    </div>
@endif

@if(Session::has('success'))

    <div class="alert alert-success">
        <i class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </div>
@endif