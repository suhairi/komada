
<div class="row">

    <div class="col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Overlap</h4></div>
            <div class="panel-body">

            @if($kelayakan)

                {!! Form::open(['route' => 'members.pinjaman.overlap.process', 'method' => 'POST']) !!}
                {!! Form::hidden('no_gaji', Session::get('no_gaji')) !!}

                <table class="table table-condensed table-hover">
                    <tr>
                        <th>Jenis Pinjaman</th>
                        <td>Pinjaman Wang Tunai</td>
                    </tr>                    
                    <tr>
                        <th><div class="input-group">Jumlah Pinjaman (RM)</div></th>
                        <td>{!! Form::number('jumlah', '0.00', ['class' => 'form-control', 'step' => 'any', 'min' => $info[2], 'id' => 'jumlah', 'onkeyup' => 'calc()', 'required' => 'true']) !!}</td>
                    </tr>
                    <tr>
                        <th><div class="input-group">Jumlah Langsai (RM)</div></th>
                        <td>{!! Form::number('langsai', $info[2], ['class' => 'form-control', 'id' => 'langsai', 'readonly' => true]) !!}</td>
                    </tr>
                    <tr>
                        <th><div class="input-group">Jumlah Di Tangan (RM)</div></th>
                        <td>{!! Form::number('jumlahDitangan', '0.00', ['class' => 'form-control', 'id' => 'jumlahDitangan', 'readonly' => true]) !!}</td>
                    </tr>

                    <tr>
                        <th>Tempoh (bulan)</th>
                        <td>{!! Form::number('tempoh', '', ['class' => 'form-control', 'id' => 'tempoh', 'placeholder' => 'Tempoh', 'onkeyup' => 'calc()', 'required' => 'true']) !!}</td>
                    </tr>
                    <tr>
                        <th>Caj Perkhidmatan</th>
                        <td>{!! Form::number('byrn_perkhidmatan', '0.00', ['class' => 'form-control', 'id' => 'byrn_perkhidmatan', 'onkeyup' => 'calc()',]) !!}</td>
                    </tr>
                    <tr>
                        <th>Insurans</th>
                        <td>{!! Form::number('insurans', '0.00', ['class' => 'form-control', 'id' => 'insurans', 'onkeyup' => 'calc()',]) !!}</td>
                    </tr>
                    <tr>
                        <th>Kadar (setahun)</th>
                        <td>{!! Form::select('kadar', ['4.0' => '4.0', '5.0' => '5.0', '6.0' => '6.0', '7.0' => '7.0', '8.0' => '8.0', '9.0' => '9.0'], '6.0', ['class' => 'form-control', 'id' => 'kadar_peratus', 'onchange' => 'calc()']) !!}</td>
                    </tr>

                    <tr>
                        <th>Kadar Bulanan (RM)</th>
                        <td>{!! Form::number('kadar_bulanan', '0.00', ['class' => 'form-control', 'id' => 'kadar_bulanan', 'readonly' => true]) !!}</td>
                    </tr>

                    <tr>
                        <th>Jumlah Kadar Keseluruhan</th>
                        <td>{!! Form::number('jumlah_kadar_keseluruhan', '0.00', ['class' => 'form-control', 'id' => 'jumlah_kadar_keseluruhan', 'readonly' => true]) !!}</td>
                    </tr>

                    <tr>
                        <th>Bayaran Perkhidmatan</th>
                        <td>{!! Form::number('caj_perkhidmatan', '0.00', ['class' => 'form-control', 'id' => 'byrn_perkhidmatan', 'readonly' => true]) !!}</td>
                    </tr>
                    <tr>
                        <th>Jumlah yang Perlu Dibayar</th>
                        <td>{!! Form::number('jumlah_keseluruhan', '0.00', ['class' => 'form-control', 'readonly' => true, 'id' => 'jumlah_perlu_bayar']) !!}</td>
                    </tr>
                    <tr>
                        <th>Bayaran Bulanan</th>
                        <td>{!! Form::number('byrn_bulanan', '0.00', ['class' => 'form-control', 'id' => 'byrn_bulanan', 'readonly' => true]) !!}</td>
                    </tr>
                </table>
                <div align="right">@include('buttons._submit', ['value' => 'Proses Pinjaman'])</div>
                {!! Form::close() !!}
            @else
                <div class="alert alert-danger">Gagal. Tidak Layak Overlap.<br />
                    <strong>Jumlah Layak Pinjam : RM {{ number_format($info[3], 2) }}, Jumlah Langsai : RM {{ number_format($info[2], 2) }}</strong></div>
            @endif

            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Maklumat Pinjaman</h4></div>
            <div class="panel-body">
                <table class="table table-condensed table-striped">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $profile->nama}}</td>
                    </tr>
                    <tr>
                        <th>No KP <br /> No Gaji</th>
                        <td>{{ $profile->nokp }} <br /> {{ $profile->no_gaji }}</td>
                    </tr>
                    <tr class="danger">
                        <th>Layak Pinjam</th>
                        <td align="right">RM {{ number_format($layakPinjam['jumlah'], 2) }} <br />{{ $layakPinjam['desc'] }}</td>
                    </tr>
                    <tr>
                        <th>Baki Pinjaman</th>
                        <td align="right">RM {{ number_format($info[0], 2) }} / {{ number_format($akaun->jumlah_keseluruhan, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Baki Tempoh</th>
                        <td align="right">{{ $info[1] }} / {{ $akaun->tempoh }} bulan</td>
                    </tr>
                    <tr>
                        <th>Jumlah Langsai</th>
                        <td align="right">RM {{ number_format($info[2], 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>

<script>

    function calc()
    {
        jumlah = document.getElementById('jumlah').value;
        kadar_peratus = document.getElementById('kadar_peratus').value
        tempoh = document.getElementById('tempoh').value
        insurans = document.getElementById('insurans').value
        langsai = document.getElementById('langsai').value;

        if(jumlah >= 5000)
            document.getElementById('byrn_perkhidmatan').value = '50.00';
        else
            document.getElementById('byrn_perkhidmatan').value = '0.00';

        document.getElementById('kadar_bulanan').value = (kadar_peratus * jumlah / 100 / 12).toFixed(2);

        document.getElementById('jumlah_kadar_keseluruhan').value = (document.getElementById('kadar_bulanan').value * tempoh).toFixed(2);
        kadar_keseluruhan = document.getElementById('jumlah_kadar_keseluruhan').value;


        document.getElementById('jumlah_perlu_bayar').value = (parseFloat(jumlah) + parseFloat(document.getElementById('byrn_perkhidmatan').value)
        + (tempoh * document.getElementById('kadar_bulanan').value) + parseFloat(insurans)).toFixed(2);

        document.getElementById('byrn_bulanan').value = (parseFloat(document.getElementById('jumlah_perlu_bayar').value) / parseInt(tempoh)).toFixed(2);
        document.getElementById('jumlahDitangan').value = (parseFloat(jumlah - langsai));
    }
</script>