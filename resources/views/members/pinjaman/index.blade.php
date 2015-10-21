@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Pinjaman Biasa</h4></div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'members.pinjaman.proses', 'method' => 'POST']) !!}

                    <div class="form-group">
                        <label for="no_anggota">No Anggota</label>
                        {!! Form::text('no_anggota', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        <label for="perkhidmatan_id">Perkhidmatan</label>
                        {!! Form::select('perkhidmatan_id', $perkhidmatan, null, ['class' => 'form-control', 'placeholder' => 'JENIS PERKHIDMATAN']) !!}
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        {!! Form::number('jumlah', null, ['step' => 'any', 'min' => '0', 'class' => 'form-control', 'placeholder' => 'JUMLAH PINJAMAN']) !!}
                    </div>

                    <div align="right">@include('buttons._submit', ['value' => 'Proses Pinjaman'])</div>

                    <!! Form::close() !!}
                </div>
        </div>
    </div>

@stop