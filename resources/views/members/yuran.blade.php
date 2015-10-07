@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Yuran Tambahan</h4></div>
                <div class="panel-body">
                    @forelse($yuranTambahans as $yuranTambahan)
                        @include('yuran._yuranTambahan')
                    @empty
                        @include('forms._yuranTambahan')
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Yuran Bulanan</h4></div>
                <div class="panel-body">
                    @include('yuran._yuranBulanan')
                </div>
            </div>
        </div>
    </div>
@stop