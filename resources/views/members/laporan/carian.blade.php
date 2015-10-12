@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Carian Kad  Ahli</h4></div>
                <div class="panel-body">

                    <form method="post" action="{{ route('members.laporan.carianPost') }}">
                        @include('forms._carian')
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop