@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Kemaskini Nilai TKA</h4></div>
            <div class="panel-body">

                {!! Form::open() !!}

                    <div class="form-group">
                        <label for="jumlah">Jumlah Semasa</label>
                        {!! Form::number('jumlah', number_format($tka->jumlah, 2), ['class' => 'form-control', 'step' => 'any']) !!}
                    </div>

                    <div align="right">
                        {!! Form::submit('Kemaskini TKA', ['class' => 'btn btn-success']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            </div>
        </div>

    </div>


@stop