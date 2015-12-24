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

        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Senarai Pinjaman Hampir Selesai</h4></div>
                <div class="panel-body">

                    <table class="table table-striped">
                        <tr>
                            <th>Nama</th>
                            <th>No Gaji</th>
                            <th><div align="center">Bulanan (RM)</div></th>
                            <th><div align="center">Baki (RM)</div></th>
                        </tr>
                        <tbody>
                        @forelse($profiles as $profile)
                            <tr>
                                <td>{{ $profile['nama'] }}</td>
                                <td>{{ $profile['no_gaji'] }}</td>
                                <td align="right">{{ number_format($profile['bulanan'], 2) }}</td>
                                <td align="right">{{ number_format($profile['baki'], 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="alert alert-danger">Tiada Data.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@stop