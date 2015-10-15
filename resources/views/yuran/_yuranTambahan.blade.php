
    <tr>
        <td>{{ $yuranTambahan->created_at->month }}/{{ $yuranTambahan->created_at->year }}</td>
        <td>{{ $yuranTambahan->nama }}</td>
        <td>{{ $yuranTambahan->catatan }}</td>
        <td>{{ number_format($yuranTambahan->jumlah, 2) }}</td>
    </tr>
