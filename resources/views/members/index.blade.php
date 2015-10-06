@extends('layouts.members')

@section('content')

        <div class="jumbotron" style="padding: 8px">
            <h4>Hello Members</h4>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <a href="{{ route('logout') }}">Log Keluar</a>
            </div>
        </div>

@stop