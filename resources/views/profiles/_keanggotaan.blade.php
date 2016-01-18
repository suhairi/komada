<table class="table">
    <tr>
        <th>Jumlah Keseluruhan</th>
        <th>Jumlah Tidak Aktif</th>
        <th>Jumlah Aktif Semasa</th>
        <th>No Anggota Terakhir</th>
    </tr>
    <tr>
        <td>{{ $anggota['keseluruhan'] }}</td>
        <td>{{ $anggota['aktif'] }}</td>
        <td>{{ ($anggota['keseluruhan'] - $anggota['aktif'] -$anggota['inactive']) }}</td>
        <td>{{ $anggota['no_akhir'] }}</td>
    </tr>

</table>