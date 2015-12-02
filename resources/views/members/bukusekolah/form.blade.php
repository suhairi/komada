@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Pinjaman Buku Sekolah</h4></div>
                <div class="panel-body">

                    <form method="post" action="{{ route('members.bukusekolah.proses') }}">
                        <div class="form-group">
                            <label for="No gaji">No Gaji</label>
                            <input class="form-control" type="text" name="no_gaji" value="{{ $profile->no_gaji }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input class="form-control" type="text" name="nama" value="{{ $profile->nama }}" readonly />
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input class="form-control" type="number" name="jumlah" max="500" />
                        </div>


                        <div align="right">@include('buttons._submit', ['value' => 'Proses Pinjaman'])</div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@stop