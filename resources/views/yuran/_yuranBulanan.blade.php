<table class="table table-bordered">
    <tr>
        <th>Jumlah Anggota</th>
        <td>{{ $count['totalAnggota'] }}</td>
    </tr>
    <tr>
        <th>Jumlah Anggota Aktif</th>
        <td>{{ $count['totalAnggotaAktif'] }}</td>
    </tr>
    <tr>
        <th>Jumlah Anggota Tidak Aktif</th>
        <td>{{ $count['totalAnggotaXAktif'] }}</td>
    </tr>

    <tr>
        <th>Jumlah Anggota Bulan ini</th>
        <td>{{ $count['totalAnggotaBaru'] }}</td>
    </tr>

    <tr>
        <th>Jumlah Anggota Yang telah Membuat Bayaran Yuran</th>
        <td>{{ $count['totalYuran'] }}</td>
    </tr>
</table>

@if($count['totalAnggotaAktif'] != $count['totalYuran'] && $count['totalYuran'] == 0)
    @include('forms._yuranBulanan')
@else
    <table class="table">
        <tr>
            <td class="alert-success">Yuran Bulan ini telah diproses.</td>
        </tr>
    </table>
@endif

