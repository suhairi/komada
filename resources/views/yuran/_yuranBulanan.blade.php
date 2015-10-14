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

@if($count['totalAnggotaAktif'] != $count['totalYuran'])
    @include('forms._yuranBulanan')
@else
    <table class="table">
        <tr>
            <td class="alert-success">Yuran Bulan ini telah diproses.</td>
        </tr>
    </table>
@endif

