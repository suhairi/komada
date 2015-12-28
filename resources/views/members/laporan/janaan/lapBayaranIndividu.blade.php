@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-8">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Senarai Bayaran bagi tahun {{ date('Y') }}</h4></div>
                <div class="panel-body">

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <td colspan="3">{{ $nama }}</td>
                            </tr>
                            <tr>
                                <th>No Gaji</th>
                                <td>{{ $no_gaji }}</td>
                            </tr>
                            <tr>
                                <th>Bulan</th>
                                <th>Perkara</th>
                                <th>Catatan</th>
                                <th><div align="right">Jumlah (RM) </div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $jumlah = 0.00; ?>
                            @foreach($bayaran as $bayar)

                                <?php $jumlah += $bayar['jumlah']; ?>
                                <tr>
                                    <td>{{ $bayar['bulan'] }}</td>
                                    <td>{{ $bayar['perkara'] }}</td>
                                    <td>{{ $bayar['catatan'] }}</td>
                                    <td align="right" width="10">{{ number_format($bayar['jumlah'], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" align="right"><strong>JUMLAH</strong></td>
                                <td align="right"><strong>{{ number_format($jumlah, 2) }}</strong></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop