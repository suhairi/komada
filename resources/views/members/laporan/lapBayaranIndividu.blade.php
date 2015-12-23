@extends('layouts.members')


@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Carian Laporan Bayaran Individu</h4></div>
                <div class="panel-body">

                    <form method="post" action="{{ route('members.laporan.lapBayaranIndividu') }}">
                    {{ csrf_field() }}
                        @include('forms._carian')
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop