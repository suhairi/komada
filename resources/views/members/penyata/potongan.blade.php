@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Ringkasan Potongan Bulanan</h4></div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr class="alert alert-info">
                            <th>Keterangan</th>
                            <th>Butiran</th>
                        </tr>
                        <tr>
                            <th>Tarikh Pinjaman</th>
                            <td>{{ $akaunPotongan->created_at->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $akaunPotongan->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Tempoh (bulan)</th>
                            <td>{{ $akaunPotongan->tempoh }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bayaran (RM)</th>
                            <td>{{ $akaunPotongan->jumlah_keseluruhan }}</td>
                        </tr>
                        <tr>
                            <th>Baki (RM)</th>
                            <td>{{ $akaunPotongan->baki }}</td>
                        </tr>
                    </table>

                </div>
            </div>

        </div>

        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Details Pinjaman</h4></div>
                <div class="panel-body">
                    <table class="table table-striped table-striped">
                        <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Bulan - Tahun</th>
                            <th>Bayaran (RM)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1.</td>
                            <td>10 2015</td>
                            <td>RM 55.00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@stop