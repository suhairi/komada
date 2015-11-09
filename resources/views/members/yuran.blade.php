@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Yuran Tambahan</h4></div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Bulan / Tahun</th>
                            <th>Keterangan Sumbangan</th>
                            <th>Catatan</th>
                            <th>Jumlah (RM)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('forms._yuranTambahan')
                    @forelse($yuranTambahans as $yuranTambahan)
                        @include('yuran._yuranTambahan')
                    @empty
                        <tr>
                            <td colspan="4">Tiada data bulan ini.</td>
                        </tr>
                    @endforelse
                        </tbody>
                    </table>
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