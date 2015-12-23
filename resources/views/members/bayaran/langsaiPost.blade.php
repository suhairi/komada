@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Bayaran Langsai</h4></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $profile->nama }}</td>
                        </tr>
                        <tr>
                            <th>No Gaji</th>
                            <td>{{ $profile->no_gaji }}</td>
                        </tr>
                        <tr>
                            <th>No KP</th>
                            <td>{{ $profile->nokp }}</td>
                        </tr>
                        <form method="post" action="{{ route('members.bayaran.langsaiProses') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="no_gaji" value="{{ $profile->no_gaji }}">

                            <tr>
                                <th>Pinjaman</th>
                                <td>
                                    <select name="akaunpotongan_id" class="form-control" id="akaunpotongan_id" required="" onchange="calc()">
                                        <option>Baki Pinjaman</option>
                                        @foreach($accounts as $account)
                                            <option value="{{ $account['id'] }}">{{ strtoupper(strtolower($account['nama'])) }} (Baki : RM {{ number_format($account['baki'], 2) }})</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Bayaran (RM)</th>
                                <td><input type="number" name="jumlah_bayaran" class="form-control" id="jumlah_bayaran" step="any" required="" readonly /></td>
                            </tr>

                            <tr>
                                <td colspan="2"><div align="right">@include('buttons._submit', ['value' => 'Proses Bayaran Langsai'])</div></td>
                            </tr>

                        </form>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script language="javascript">

        function calc() {
            id = document.getElementById('akaunpotongan_id').value;
            baki = 0.00;

            @foreach($accounts as $account)

                if({{ $account['id']}} == id)
                    baki = {{ $account['baki'] }}

            @endforeach

            document.getElementById('jumlah_bayaran').value = (baki).toFixed(2);



        }

    </script>

@stop