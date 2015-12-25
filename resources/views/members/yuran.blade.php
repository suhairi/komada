@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Sumbangan Tambahan</h4></div>
                <div class="panel-body" id="tambahan">

                    @if($count['totalYuran'] > 0)
                        <div class="alert alert-info">Yuran Tambahan ini telah ditutup kerana yuran bulanan telah diproses</div>

                    @else
                        @include('forms._yuranTambahan')
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Bulan / Tahun</th>
                                <th>Keterangan Sumbangan</th>
                                <th>Penerima</th>
                                <th>Jumlah (RM)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($yuranTambahans as $yuranTambahan)
                                @include('yuran._yuranTambahan')
                            @empty
                                <tr>
                                    <td colspan="4">Tiada data bulan ini.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Yuran Bulanan</h4></div>
                <div class="panel-body">
                    <div id="form">
                        @include('yuran._yuranBulanan')
                    </div>
                    @include('progress-bar.yuran')
                </div>
            </div>
        </div>
    </div>
@stop