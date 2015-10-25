<div class="panel panel-primary">
    <div class="panel-heading"><h4>Maklumat Pinjaman (Kali Pertama)</h4></div>
    <div class="panel-body">

        {!! Form::open() !!}
        <table class="table table-condensed">
            <tr>
                <th>Jenis Pinjaman</th>
                <td>Pinjaman Wang Tunai</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{!! Form::number('jumlah', '0.00', ['class' => 'form-control', 'step' => 'any']) !!}</td>
            </tr>
            <tr>
                <th>Tempoh</th>
                <td>{!! Form::select('Tempoh', ['12', '24', '36', '48', '60'], null, ['class' => 'form-control', 'placeholder' => 'Kadar']) !!}</td>
            </tr>
            <tr>
                <th>Kadar (% setahun)</th>
                <td>{!! Form::number('Kadar', 6, ['class' => 'form-control', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Baki Tempoh</th>
                <td>{!! Form::number('Baki Tempoh', 0, ['class' => 'form-control', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Jumlah Telah Bayar</th>
                <td>{!! Form::number('jumlah_telah_bayar', '0.00', ['class' => 'form-control', 'readonly' => true, 'onkeyup' => 'calc()']) !!}</td>
            </tr>
            <tr>
                <th>Baki</th>
                <td>{!! Form::number('baki', '0.00', ['class' => 'form-control', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Bayaran Perkhidmatan</th>
                <td>{!! Form::number('byrn_perkhidmatan', '0.00', ['class' => 'form-control', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Insurans</th>
                <td>{!! Form::number('insurans', '0.00', ['class' => 'form-control', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Jumlah yang Perlu Dibayar</th>
                <td>{!! Form::number('jumlah_perlu_bayar', '0.00', ['class' => 'form-control', 'readonly' => true]) !!}</td>
            </tr>
            <tr>
                <th>Bayaran Bulanan</th>
                <td>{!! Form::number('bayaran_bulanan', '0.00', ['class' => 'form-control', 'readonly' => true]) !!}</td>
            </tr>

        </table>
        {!! Form::close() !!}

    </div>
</div>

<script>

    function calc()
    {
        alert('here');
    }
</script>