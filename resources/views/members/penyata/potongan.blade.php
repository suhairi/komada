@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Ringkasan Pinjaman Wang Tunai</h4></div>
                <div class="panel-body">
                    {{--{{ dd($akaun) }}--}}
                    <table class="table table-bordered">
                        <tr class="alert alert-info">
                            <th>Keterangan</th>
                            <th>Butiran</th>
                        </tr>
                        <tr>
                            <th>Tarikh Pinjaman</th>
                            <?php //$tarikh = Carbon\Carbon::createFromFormat('d m Y', $akaun['created_at']); ?>
                            <td>{{ $akaun['created_at'] }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $akaun['jumlah'] }}</td>
                        </tr>
                        <tr>
                            <th>Tempoh (bulan)</th>
                            <td>{{ $akaun['tempoh'] }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bayaran (RM)</th>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <th>Baki (RM)</th>
                            <td>{{ $akaun['jumlah'] -  }}</td>
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
                    </table>
                </div>
            </div>
        </div>

    </div>


@stop