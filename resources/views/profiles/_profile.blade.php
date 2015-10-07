<div class="panel panel-info">
    <div class="panel-heading"><h5>Maklumat Anggota</h5></div>
    <div class="panel-body">
        <table class="table table-hover">
            <tr>
                <th width="150">No Anggota</th>
                <td>{{ $profile->no_anggota }}</td>
            </tr>
            <tr>
                <th>No KP</th>
                <td>{{ $profile->nokp }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $profile->nama }}</td>
            </tr>
            <tr>
                <th>Jantina</th>
                <td>{{ $profile->jantina }}</td>
            </tr>
            <tr>
                <th>Bangsa</th>
                <td>{{ $profile->bangsa }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $profile->agama }}</td>
            </tr>
            <tr>
                <th>Alamat 1 / Alamat 2</th>
                <td>{{ $profile->alamat1 }} {{ $profile->alamat2 }}</td>
            </tr>
            <tr>
                <th>Jawatan</th>
                <td>{{ $profile->nama }}<br /> {{ $profile->taraf_jawatan }}</td>
            </tr>
            <tr>
                <th>Tarikh Mula Berkhidmat</th>
                <td>{{ $profile->tarikh_khidmat }}</td>
            </tr>


        </table>
    </div>
</div>
