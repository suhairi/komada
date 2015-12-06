@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Pinjaman Insurans</h4></div>
                <div class="panel-body">

                    <form method="post" action="{{ route('members.insurans.proses') }}">
                        {{ csrf_field() }}
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
                            <input class="form-control" type="number" name="jumlah" max="500" id="jumlah" step="any" placeholder="Contoh : RM 500.00" onkeyup="calc()" />
                        </div>

                        <div class="form-group">
                            <label for="tempoh">Tempoh (bulan)</label>
                            <input class="form-control" type="number" name="tempoh" id="tempoh" value="8" max="12" onkeyup="calc()" />
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Kadar</label>
                            <select name="kadar" class="form-control" id="kadar" onkeyup="calc()">
                                <option value="">Kadar</option>
                                <option value="4">4 %</option>
                                <option value="5">5 %</option>
                                <option value="6" selected>6 %</option>
                                <option value="7">7 %</option>
                                <option value="8">8 %</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keseluruhan">Jumlah Keseluruhan</label>
                            <input class="form-control" type="number" name="jumlah_keseluruhan" id="keseluruhan" readonly />
                        </div>

                        <div class="form-group">
                            <label for="bulanan">Bayaran Bulanan</label>
                            <input class="form-control" type="number" name="bulanan" id="bulanan" readonly />
                        </div>

                        <div align="right">@include('buttons._submit', ['value' => 'Proses Pinjaman'])</div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        function calc()
        {
            jumlah = document.getElementById('jumlah').value;
            kadar = document.getElementById('kadar').value;
            tempoh = document.getElementById('tempoh').value;

            jumlahKadar = ((parseFloat(jumlah) * parseFloat(kadar) / 100) / 12 * parseFloat(tempoh));
            jumlahKeseluruhan = parseFloat(jumlah) + parseFloat(jumlahKadar);

            document.getElementById('keseluruhan').value = jumlahKeseluruhan.toFixed(2);

            bulanan = (parseFloat(jumlahKeseluruhan) / parseFloat(tempoh));

            document.getElementById('bulanan').value = bulanan.toFixed(2);

        }
    </script>

@stop