@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Daftar Bayaran Tangguh</h4></div>
                <div class="panel-body">
                    <form method="post" action="{{ route('members.tangguh.index.post') }}">
                        {{ csrf_field() }}
                        @include('forms._carian')
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop