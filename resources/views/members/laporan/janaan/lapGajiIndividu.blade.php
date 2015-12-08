@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>{{ $bahagian-> nama }} ({{ $bahagian->kod }})</h4></div>
                <div class="panel-body">

                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Bil</th>
                            <th>No Pek</th>
                            <th>Nama</th>
                            <th>Yuran</th>
                            <th>TKA</th>
                            <th>PER</th>
                            <th>M/P</th>
                            <th>S/K</th>
                            <th>W/T</th>
                            <th>K/C</th>
                            <th>B/S</th>
                            <th>T/B</th>
                            <th>Ins</th>
                            <th><div align="right">JUMLAH</div></th>
                        </tr>
                        @foreach($persons as $person)
                            <tr>
                                <td>{{ $bil++ }}</td>
                                <td>{{ $person['no_gaji'] }}</td>
                                <td>{{ $person['nama'] }}</td>
                                <td align="right">{{ number_format($person['yuran'], 2) }}</td>
                                <td align="right">{{ number_format($person['tka'], 2) }}</td>
                                <td align="right">{{ number_format($person['pertaruhan'], 2) }}</td>
                                <td align="right">{{ number_format($person['takaful'], 2) }}</td>
                                <td align="right">{{ number_format($person['sumbangan'], 2) }}</td>
                                <td align="right">{{ number_format($person['pwt'], 2) }}</td>
                                <td align="right">{{ number_format($person['kecemasan'], 2) }}</td>
                                <td align="right">{{ number_format($person['bsekolah'], 2) }}</td>
                                <td align="right">{{ number_format($person['tb'], 2) }}</td>
                                <td align="right">{{ number_format($person['ins'], 2) }}</td>
                                <th><div align="right">{{ number_format($person['jumlah'], 2) }}</div></th>
                            </tr>
                        @endforeach
                        <tr>
                            <td align="right" colspan="13"><strong>JUMLAH BESAR</strong></td>
                            <th><div align="right">{{ number_format($jumlahBesar, 2) }}</div></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop