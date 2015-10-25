@extends('layouts.members')

@section('content')
    <div class="row">
        <div class="col-xs-6">

            {{ $found }}

            @if($found)
                @include('calculator._overlap')
            @else
                @include('calculator._firsttime')
            @endif

        </div>
    </div>


@stop