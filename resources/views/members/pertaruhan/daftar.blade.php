@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Daftar Wang Pertaruhan</h4></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $profile->nama }}</td>
                        </tr>
                        <tr>
                            <th>No Gaji</th>
                            <td>{{ $profile->no_gaji }}</td>
                        </tr>
                        <tr>
                            <th>No KP</th>
                            <td>{{ $profile->nokp }}</td>
                        </tr>
                        <tr>
                            <th>Yuran Bulanan</th>
                            <td>{{ number_format($profile->jumlah_yuran_bulanan, 2) }}</td>
                        </tr>
                        {!! Form::open(['route' => 'members.pertaruhan.daftarPost', 'method' => 'post']) !!}

                            {!! Form::hidden('no_gaji', $profile->no_gaji) !!}
                            <tr>
                                <th>Jumlah Wang Pertaruhan</th>
                                <td>{!! Form::number('jumlah_pertaruhan', number_format($profile->jumlah_pertaruhan, 2), ['class' => 'form-control', 'step' => 'any']) !!}</td>
                            </tr>
                            <tr>
                                <td colspan="2"><div align="right">@include('buttons._submit', ['value' => 'Daftar Pertaruhan'])</div></td>
                            </tr>

                        {!! Form::close() !!}

                    </table>
                </div>
            </div>
        </div>
    </div>

@stop