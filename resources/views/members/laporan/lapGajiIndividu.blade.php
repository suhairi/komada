@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel panel-heading"><h4>Jadual Potongan Gaji Individu</h4></div>
                <div class="panel-body">

                    <div id="form">

                    <form method="post" action="{{ route('members.laporan.lapGajiIndividu.generate') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="zon">Zon PembayaranGaji</label>
                            <select name="zon" class="form-control" required="">
                                <option>Zon Pembayaran Gaji</option>

                                @foreach($zones as $zone)
                                    <option value="{{ $zone->kod }}">{{ $zone->kod }} - {{ $zone->nama }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bulan">Bulan / Tahun</label>
                            <select name="bulan" class="form-control" required="">
                                <option>Bulan</option>
                                @for($i=1; $i<=12; $i++)
                                    <option value="{{$i}}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tahun" class="form-control" required="">
                                <option>Tahun</option>
                                @for($i=2015; $i<=date('Y'); $i++)
                                    <option value="{{$i}}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div align="right">@include('buttons._submit', ['value' => 'Jana Laporan'])</div>
                    </form>
                    </div>
                    @include('progress-bar.fast')


                </div>
            </div>
        </div>
    </div>





@stop