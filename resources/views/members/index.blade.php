@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-5">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Carian Profile Anggota</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'members.carian', 'method' => 'post']) !!}
                        @include('forms._carian')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@stop