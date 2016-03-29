{{--{{ dd($profile) }}--}}

<div class="panel panel-info">
    <div class="panel-heading"><h4>Maklumat Anggota</h4></div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <tr>
                <th width="250">No Gaji</th>
                <td>{{ $profile->no_gaji }}</td>
            </tr>
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
                <td>{{ $profile->jantina->nama }}</td>
            </tr>
            <tr>
                <th>Alamat 1 / Alamat 2</th>
                <td>{{ $profile->alamat1 }}
                    @if(str_replace(' ', '', $profile->alamat1) != '')
                        , {{ $profile->alamat2 }}
                    @endif
                </td>
            </tr>
            <tr>
                <th>Jawatan</th>
                <td>
                    {{ $profile->taraf_jawatan }}

                    @if(str_replace(' ', '', $profile->taraf_jawatan) != '')
                        - {{ $profile->jawatan }}
                    @endif

                </td>
            </tr>
            <tr>
                <th>Yuran Bulanan</th>
                <td>RM {{ number_format($profile->jumlah_yuran_bulanan, 2) }}</td>
            </tr>
            <tr>
                <th>Pertaruhan</th>
                <td>RM {{ number_format($profile->jumlah_pertaruhan, 2) }}</td>
            </tr>
            <tr>
                <th>Zon Pembayaran Gaji</th>
                <td>{{ $profile->zon->nama }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    @if($profile->status == 1)
                        AKTIF
                    @elseif($profile->status == 2)
                        PENCEN
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
