@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Pengguna</h4></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Nama</th>
                            <th>Emel</th>
                            <th>Pilihan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $bil++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('members.settings.pengguna.delete', ['id' => $user->id]) }}">
                                        @include('buttons._hapus')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Daftar Pengguna</h4></div>
                <div class="panel-body">

                    {!! Form::open() !!}

                    <div class="form-group">
                        <label for="name">Nama</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Penuh', 'required' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        <label for="email">Emel</label>
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Emel', 'required' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Laluan</label>
                        {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'password', 'required' => 'true']) !!}
                    </div>

                    <div align="right">@include('buttons._submit', ['value' => 'Daftar Pengguna'])</div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>



@stop