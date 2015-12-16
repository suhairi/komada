@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>LAPORAN POTONGAN GAJI BULAN</h4></div>
                <div class="panel-body">

                    <table class="table table-hover table-bordered">
                        <tr>
                            <th><div align="center">Perkara</div></th>
                            @foreach($zones as $zone)
                                <th><div align="center">{{ $zone->kod }}</div></th>
                            @endforeach
                            <th><div align="center">JUMLAH</div></th>
                        </tr>
                        <tr>
                            <th>PWT - {{ dd($pwt['01']['jumlah']) }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop