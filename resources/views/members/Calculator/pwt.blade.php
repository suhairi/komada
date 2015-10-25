@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Carian</h4></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'members.calculator.pwtPost', 'method' => 'post']) !!}

                    @include('forms._carian')
                    {{--<div class="form-group">--}}
                        {{--<label for="no_gaji">No Gaji</label>--}}
                        {{--{!! Form::number('no_gaji', null, ['class' => 'form-control']) !!}--}}
                    {{--</div>--}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@stop