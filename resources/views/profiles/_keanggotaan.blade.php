<table class="table">
    <tr>
        <th>Jumlah Keseluruhan</th>
        <th>Jumlah Aktif</th>
        <th>Tidak Aktif Tahun Ini</th>
        <th>No Anggota Terakhir</th>
    </tr>
    <tr>
        <td>{{ $anggota['keseluruhan'] }}</td>
        <td>{{ $anggota['aktif'] }}</td>
        <td>{{ $anggota['inactive'] }}</td>
        <td>{{ $anggota['no_akhir'] }}</td>
    </tr>

</table>