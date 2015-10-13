<div class="panel panel-info">
    <div class="panel-heading"><h4>Maklumat Anggota</h4></div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
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
                <td>{{ $profile->alamat1 }}, {{ $profile->alamat2 }}</td>
            </tr>
            <tr>
                <th>Jawatan</th>
                <td>{{ $profile->taraf_jawatan }} - {{ $profile->jawatan }}</td>
            </tr>
            <tr>
                <th>Tarikh Mula Berkhidmat</th>
                <td>{{ $profile->tarikh_khidmat->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($profile->status == 1)
                        AKTIF
                    @else
                        TIDAK AKTIF
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <a href="{{ route('members.profiles.edit', ['id' => $profile->no_anggota]) }}"
                    <button class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"> </i> Kemaskini</button>
                </td>
            </tr>
        </table>

    </div>
</div>
