@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Daftar Anggota</h4></div>

            <div class="panel-body">

                {!! Form::open(['route' => 'members.profiles) !!}
                    @include('profiles._new')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop