<table class="table table-responsive">
    <thead>
    <tr>
        <th>Bulan / Tahun</th>
        <th>Keterangan Sumbangan</th>
        <th>Catatan</th>
        <th>Jumlah (RM)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $yuranTambahan->created_at->month }}/{{ $yuranTambahan->created_at->year }}</td>
        <td>{{ $yuranTambahan->nama }}</td>
        <td>{{ $yuranTambahan->catatan }}</td>
        <td>{{ number_format($yuranTambahan->jumlah, 2) }}</td>
    </tr>
    </tbody>
</table>