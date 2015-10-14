@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Daftar Anggota</h4></div>

                <div class="panel-body">

                    {!! Form::open(['route' => 'members.profiles.addUser']) !!}
                        @include('profiles._new')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-4">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Maklumat Keanggotaan</h4></div>

                <div class="panel-body">

                    <table class="table">
                        <tr>
                            <td>Jumlah Keseluruhan</td>
                            <td>Jumlah Aktif</td>
                            <td>No Anggota Terakhir</td>
                        </tr>
                        <tr>
                            <td>{{ $anggota['keseluruhan'] }}</td>
                            <td>{{ $anggota['aktif'] }}</td>
                            <td>{{ $anggota['no_akhir'] }}</td>
                        </tr>

                    </table>


                </div>
            </div>
        </div>

    </div>



@stop