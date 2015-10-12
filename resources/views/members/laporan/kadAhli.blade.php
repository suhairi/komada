@extends('layouts.members')


@section('content')

<div class="row">
    <div class="col-xs-12">

        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Kad Ahli</h4></div>
            <div class="panel-body">

                <table>
                    <tr>
                        <td align="center"><h2>KOPERASI PEGAWAI-PEGAWAI LEMBAGA KEMAJUAN PERTANIAN MUDA</h2></td>
                    </tr>
                    <tr>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <td>{{ $profile->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>:</th>
                                            <td>{{ $profile->alamat1 }}, {{ $profile->alamat2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Penama</th>
                                            <th>:</th>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="center">
                                    <table class="table">
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">&nbsp;</th>
                                        </tr>
                                        <tr align="center">
                                            <th>Tahun</th>
                                            <th>:</th>
                                            <td>{{ \Carbon\Carbon::now()->format('Y') }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <th>No Ahli</th>
                                            <th>:</th>
                                            <td>{{ $profile->no_anggota }}</td>
                                        </tr>
                                        <tr>
                                            <th>No KP</th>
                                            <th>:</th>
                                            <td>{{ $profile->nokp }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tarikh Ahli</th>
                                            <th>:</th>
                                            <td>{{ $profile->tarikh_ahli->format('d-m-Y') }}</td>
                                        </tr>
                                    </table>
                                </td>

                            </tr>
                        </table>
                    </tr>
                    <tr>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Tarikh</td>
                                    <td>Keterangan</td>
                                    <td>TKA</td>
                                    <td>Yuran</td>
                                    <td>Pinjaman Biasa</td>
                                    <td>Cukai Jalan</td>
                                    <td>Pertaruhan</td>
                                    <td>Tayar / Bateri</td>
                                    <td>Insurans</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>


@stop