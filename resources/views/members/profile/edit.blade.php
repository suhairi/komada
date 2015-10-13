@extends('layouts.members')

@section('content')


    <div class="row">
        <div class="col-xs-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Kemaskini Profile</h4>
                </div>
                <div class="panel-body">

                    {!! Form::model($profile, ['route' => array('members.profile.update', $profile->no_anggota)]) !!}

                    <div class="form-group">
                        <label for="no_anggota">No Anggota</label>
                        {!! Form::text('no_anggota', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama </label>
                        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                     </div>

                    <div class="form-group">
                        <label for="nokp">No KP</label>
                        {!! Form::text('nokp', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        {!! Form::textarea('catatan', null, ['class' => 'form-control', 'rows' => 4]) !!}
                    </div>

                    <div class="form-group">
                        <div align="right">{!! Form::submit('Kemaskini', ['class' => 'btn btn-success']) !!}</div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop