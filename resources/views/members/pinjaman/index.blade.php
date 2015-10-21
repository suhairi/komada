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
                        <label for="jumlah">Tempoh (bulan)</label>
                        {!! Form::number('jumlah', null, ['min' => '0', 'class' => 'form-control', 'placeholder' => 'TEMPOH BAYARAN']) !!}
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        {!! Form::number('jumlah', 0.00, ['step' => 'any', 'min' => '0', 'class' => 'form-control', 'placeholder' => 'JUMLAH PINJAMAN']) !!}
                    </div>

                    <div align="right">@include('buttons._submit', ['value' => 'Proses Pinjaman'])</div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-2">
            &nbsp;
        </div>

        <div class="col-xs-3">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Rujukan - Tempoh</h4></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Bulan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>12</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>36</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>48</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>60</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@stop