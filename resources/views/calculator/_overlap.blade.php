<div class="panel panel-primary">
    <div class="panel-heading"><h4>Maklumat Pinjaman Lepas</h4></div>
    <div class="panel-body">

        {!! Form::open() !!}
        <table class="table table-condensed">
            <tr>
                <th>Jenis Pinjaman</th>
                <td>Pinjaman Wang Tunai</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{!! Form::number('jumlah', 0.00, ['class' => 'form-control']) !!}</td>
            </tr>
        </table>
        {!! Form::close() !!}

    </div>
</div>