<table class="table table-bordered">
    <tr>
        <th>Jumlah Anggota</th>
        <th>Jumlah Anggota Aktif</th>
        <th>Jumlah Anggota Yang telah Membuat Bayaran Yuran</th>
    </tr>
    <tr>
        <td>{{ $count['totalAnggota'] }}</td>
        <td>{{ $count['totalAnggotaAktif'] }}</td>
        <td>{{ $count['totalYuran'] }}</td>

    </tr>
</table>

<table class="table table-responsive">
    <thead>
    <tr>
        <th>Bulan / Tahun</th>
        <th>Jumlah</th>
        <th>Yuran Tambahan</th>
    </tr>
    </thead>
    <tbody>
    @if($yuranBulanans)
        <tr>
            <td>{{ $yuranBulanans->bulan_tahun }}</td>
            <td>{{ number_format($yuranBulanans->jumlah, 2) }}</td>
            <td>{{ number_format($yuranBulanans->yuran_tambahan_id, 2) }}</td>
        </tr>
    @else
        @include('forms._yuranBulanan')
    @endforelse
    </tbody>
</table>

