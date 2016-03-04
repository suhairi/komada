@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Daftar Bayaran Tangguh</h4></div>
                <div class="panel-body">

                    <form action="{{ route('members.tangguh.proses') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="no_gaji" value="{{ $no_gaji }}">


                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" value="{{ $nama }}" disabled />
                        </div>

                        <div class="form-group">
                            <label for="akaunpotongan_id">Akaun Potongan..</label>
                            <select name="akaunpotongan_id" class="form-control" "required">
                                <option>AKAUN</option>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->perkhidmatan->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dari">Dari Tarikh</label>
                            <input type="date" name="dari" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="sehingga">Sehingga Tarikh</label>
                            <input type="date" name="sehingga" class="form-control" />
                        </div>

                        <div align="right">
                            @include('buttons._submit', ['value' => 'Daftar Tangguh'])
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@stop