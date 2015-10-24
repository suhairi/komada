
    <tr>
        <td>{{ $yuranTambahan->created_at->month }}/{{ $yuranTambahan->created_at->year }}</td>
        <td>
            {{ $yuranTambahan->sumbangan->nama }} <br />
            <strong>{{ $yuranTambahan->profileName($yuranTambahan->no_gaji) }}</strong>

        </td>
        <td>{{ $yuranTambahan->penerima }}</td>
        <td>{{ number_format($yuranTambahan->jumlah, 2) }}</td>
    </tr>
