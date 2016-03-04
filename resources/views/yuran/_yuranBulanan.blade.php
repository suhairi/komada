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
        <th>Jumlah Anggota Baru Bulan ini</th>
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
        <tr>
            <td align="right">
                <a href="{{route('members.yuran.batal', ['bulan' => date('m'), 'year' => date('Y')])}}">
                    <button class="btn btn-danger">Batal Yuran dan Sumbangan Bulan ini</button>
                </a>
            </td>
        </tr>
    </table>
@endif

