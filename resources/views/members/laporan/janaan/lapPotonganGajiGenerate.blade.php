@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>LAPORAN POTONGAN GAJI BULAN</h4></div>
                <div class="panel-body">

                    <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th><div align="center">Perkara</div></th>
                            @foreach($zones as $zone)
                                <th><div align="center">{{ $zone->kod }}</div></th>
                            @endforeach
                            <th><div align="center">JUMLAH</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PWT</td>
                            <?php $jumlah = 0.00; ?>
                            @foreach($zones as $zone)
                                <td align="center">{{ number_format($perkara[$zone->kod]['pwt'], 2) }}</td>
                                <?php $jumlah += $perkara[$zone->kod]['pwt']; ?>
                            @endforeach
                            <td align="center">{{ number_format($jumlah, 2) }}</td>
                        </tr>
                        <tr>
                            <td>BS</td>
                            <?php $jumlah = 0.00; ?>
                            @foreach($zones as $zone)
                                <td align="center">{{ number_format($perkara[$zone->kod]['bs'], 2) }}</td>
                                <?php $jumlah += $perkara[$zone->kod]['bs']; ?>
                            @endforeach
                            <td align="center">{{ number_format($jumlah, 2) }}</td>
                        </tr>
                        <tr>
                            <td>RT</td>
                            <?php $jumlah = 0.00; ?>
                            @foreach($zones as $zone)
                                <td align="center">{{ number_format($perkara[$zone->kod]['rt'], 2) }}</td>
                                <?php $jumlah += $perkara[$zone->kod]['rt']; ?>
                            @endforeach
                            <td align="center">{{ number_format($jumlah, 2) }}</td>
                        </tr>
                        <tr>
                            <td>INS</td>
                            <?php $jumlah = 0.00; ?>
                            @foreach($zones as $zone)
                                <td align="center">{{ number_format($perkara[$zone->kod]['ins'], 2) }}</td>
                                <?php $jumlah += $perkara[$zone->kod]['ins']; ?>
                            @endforeach
                            <td align="center">{{ number_format($jumlah, 2) }}</td>
                        </tr>
                        <tr>
                            <td>KEC</td>
                            <?php $jumlah = 0.00; ?>
                            @foreach($zones as $zone)
                                <td align="center">{{ number_format($perkara[$zone->kod]['kc'], 2) }}</td>
                                <?php $jumlah += $perkara[$zone->kod]['kc']; ?>
                            @endforeach
                            <td align="center">{{ number_format($jumlah, 2) }}</td>
                        </tr>





                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


@stop