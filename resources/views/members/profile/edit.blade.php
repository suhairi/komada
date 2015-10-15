@extends('layouts.members')

@section('content')


    <div class="row">
        <div class="col-xs-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Kemaskini Profile</h4>
                </div>
                <div class="panel-body">

                    {!! Form::model($profile, ['route' => array('members.profiles.update', $profile->no_anggota), 'method' => 'patch']) !!}
                        @include('profiles._edit')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Maklumat Keanggotaan</h4></div>
                <div class="panel-body">@include('profiles._keanggotaan')</div>
            </div>
        </div>
    </div>

@stop