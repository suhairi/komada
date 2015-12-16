@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel panel-heading"><h4>Penyata Potongan Gaji</h4></div>
                <div class="panel-body">

                    <form method="post" action="{{ route('members.laporan.lapPotonganGaji.generate') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="bulan">Bulan</label>
                            <select name="bulan" class="form-control">
                                <option>Bulan</option>
                                @for($i=1; $i<=12; $i++)
                                    <option value="{{$i}}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tahun" class="form-control">
                                <option>Tahun</option>
                                @for($i=2015; $i<=date('Y'); $i++)
                                    <option value="{{$i}}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div align="right">@include('buttons._submit', ['value' => 'Jana Laporan'])</div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@stop