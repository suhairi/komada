@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel panel-heading"><h4>Jadual Potongan Gaji Individu</h4></div>
                <div class="panel-body">

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Bil</th>
                            <th>No P</th>
                            <th>Nama</th>
                            <th>BM</th>
                            <th>Yuran</th>
                            <th>TKA</th>
                            <th>Per</th>
                            <th>M/P</th>
                            <th>S/K</th>
                            <th>LL</th>
                            <th>WT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($persons as $person)
                        <tr>
                            <td>{{ $bil++ }}</td>
                            <td>{{ $person['no_gaji'] }}</td>
                            <td>{{ $person['nama'] }}</td>
                            <td></td>
                            <td>{{ $person['yuran'] }}</td>
                            <td>{{ $person['tka'] }}</td>
                            <td>{{ $person['pertaruhan'] }}</td>
                            <td>{{ $person['takaful'] }}</td>
                            <td>{{ $person['sumbangan'] }}</td>
                            <td></td>
                            <td>{{ $person['pwt'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@stop