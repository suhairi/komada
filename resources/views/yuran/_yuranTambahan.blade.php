@if($count['totalAnggotaAktif'] != $count['totalYuran'])
    <tr>
        <td>{{ $yuranTambahan->created_at->month }}/{{ $yuranTambahan->created_at->year }}</td>
        <td>{{ $yuranTambahan->nama }}</td>
        <td>{{ $yuranTambahan->catatan }}</td>
        <td>{{ number_format($yuranTambahan->jumlah, 2) }}</td>
    </tr>
@else
    <tr>
        <td colspan="4" class="alert-warning">Yuran Tambahan ini telah ditutup kerana yuran bulanan telah diproses</td>
    </tr>

@endif
