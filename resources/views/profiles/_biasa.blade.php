<div class="panel panel-info">
    <div class="panel-heading"><h4>Maklumat Pinjaman Biasa</h4></div>
    <div class="panel-body">

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Bil</th>
                <th>Tarikh Pinjaman</th>
                <th>Jenis Pinjaman</th>
                <th><div align="center">Jumlah</div></th>
                <th><div align="center">Pilihan</div></th>
            </tr>
            </thead>
            <tbody>
        @forelse($biasas as $biasa)
            <tr>
                <td>{{ $bil++ }}</td>
                <td>{{ $biasa->created_at->format('d M Y') }}</td>
                <td>{{ $biasa->perkhidmatan->nama }}</td>
                <td align="right">{{ number_format($biasa->jumlah, 2) }}</td>
                <td align="center"><a href="{{ route('members.penyata.potongan', ['id' => $biasa->id]) }}"><button class="btn btn-default">Details</button></a></td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="alert alert-danger">Tiada Pinjaman Wang Tunai</td>
            </tr>
        @endforelse
            </tbody>
        </table>

    </div>
</div>