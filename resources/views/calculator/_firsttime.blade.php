<div class="panel panel-primary">
    <div class="panel-heading"><h4>Maklumat Pinjaman (Kali Pertama)</h4></div>
    <div class="panel-body">

        {!! Form::open(['route' => 'members.pinjaman.proses', 'method' => 'POST']) !!}

        {!! Form::hidden('no_gaji', Session::get('no_gaji')) !!}
        <table class="table table-condensed table-hover">
            <tr>
                <th>Jenis Pinjaman</th>
                <td>Pinjaman Wang Tunai</td>
            </tr>
            <tr>
                <th><div class="input-group">Jumlah Pinjaman (RM)</div></th>
                <td>{!! Form::number('jumlah', '0.00', ['class' => 'form-control', 'step' => 'any', 'id' => 'jumlah', 'onkeyup' => 'calc()', 'required' => 'true']) !!}</td>
            </tr>
            <tr>
                <th>Tempoh</th>
                <td>{!! Form::select('tempoh', ['12' => '12', '24' => '24', '36' => '36', '48' => '48', '60' => '60'], null, ['class' => 'form-control', 'id' => 'tempoh', 'placeholder' => 'Tempoh', 'onchange' => 'calc()', 'required' => 'true']) !!}</td>
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
                <td>{!! Form::number('byrn_perkhidmatan', '0.00', ['class' => 'form-control', 'id' => 'byrn_perkhidmatan', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Insurans</th>
                <td>{!! Form::number('insurans', '0.00', ['class' => 'form-control', 'id' => 'insurans', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Jumlah yang Perlu Dibayar</th>
                <td>{!! Form::number('jumlah_perlu_bayar', '0.00', ['class' => 'form-control', 'readonly' => true, 'id' => 'jumlah_perlu_bayar']) !!}</td>
            </tr>
            <tr>
                <th>Bayaran Bulanan</th>
                <td>{!! Form::number('byrn_bulanan', '0.00', ['class' => 'form-control', 'id' => 'byrn_bulanan', 'readonly' => true]) !!}</td>
            </tr>
        </table>
        <div align="right">@include('buttons._submit', ['value' => 'Proses Pinjaman'])</div>
        {!! Form::close() !!}

    </div>
</div>

<script>

    function calc()
    {
        jumlah = document.getElementById('jumlah').value;
        kadar_peratus = document.getElementById('kadar_peratus').value
        tempoh = document.getElementById('tempoh').value
        insurans = document.getElementById('insurans').value

        if(jumlah >= 1000)
            document.getElementById('byrn_perkhidmatan').value = '50.00';
        else
            document.getElementById('byrn_perkhidmatan').value = '0.00';

        document.getElementById('kadar_bulanan').value = (kadar_peratus * jumlah / 100 / 12).toFixed(2);

        document.getElementById('jumlah_kadar_keseluruhan').value = (document.getElementById('kadar_bulanan').value * tempoh).toFixed(2);
        kadar_keseluruhan = document.getElementById('jumlah_kadar_keseluruhan').value;


        document.getElementById('jumlah_perlu_bayar').value = (parseFloat(jumlah) + parseFloat(document.getElementById('byrn_perkhidmatan').value)
        + (tempoh * document.getElementById('kadar_bulanan').value)).toFixed(2);

        document.getElementById('byrn_bulanan').value = (parseFloat(document.getElementById('jumlah_perlu_bayar').value) / parseInt(tempoh)).toFixed(2);
    }
</script>