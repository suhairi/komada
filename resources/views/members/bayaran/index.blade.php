@extends('layouts.members')

@section('content')

    <div class="col-xs-5">

        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Carian Bayaran Tunai</h4></div>
            <div class="panel-body">
                <form action="{{ route('members.bayaran.indexPost') }}" method="post">
                {{ csrf_field() }}
                    @include('forms._carian')
                </form>
            </div>
        </div>
    </div>




@stop