<div class="panel panel-info">
    <div class="panel-heading"><h4>Maklumat Pinjaman Biasa</h4></div>
    <div class="panel-body">

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Bil</th>
                <th>Tarikh Pinjaman</th>
                <th>Jenis Pinjaman</th>
                <th>Jumlah</th>
            </tr>
            </thead>
            <tbody>
        @foreach($biasas as $biasa)

                    <tr>
                        <td>{{ $bil++ }}</td>
                        <td>{{ $biasa->created_at->format('d M Y') }}</td>
                        <td>{{ $biasa->perkhidmatan->nama }}</td>
                        <td>{{ number_format($biasa->jumlah, 2) }}</td>
                    </tr>
        @endforeach
            </tbody>
        </table>

    </div>
</div>
