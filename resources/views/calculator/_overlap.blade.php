<div class="col-xs-12">
    <div class="panel panel-primary">
    <div class="panel-heading"><h4>Maklumat Pinjaman Lepas</h4></div>
    <div class="panel-body">

        <?php $bil = 1; ?>
        <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Bil</th>
            <th>Jenis Pinjaman</th>
            <th>Tarikh Pinjaman</th>
            <th>Jumlah</th>
            <th>Tempoh</th>
            <th>Kadar</th>
            <th>Caj Perkhidmatan</th>
            <th>Insurans</th>
            <th>Jumlah Keseluruhan</th>
            <th>Baki</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse($akaunPotongan as $akaun)
            <tr>
                <td>{{ $bil++ }}</td>
                <td>{{ $akaun->perkhidmatan->nama }}</td>
                <td>{{ $akaun->created_at->format('d M Y') }}</td>
                <td>{{ $akaun->jumlah }}</td>
                <td>{{ $akaun-> tempoh }}</td>
                <td>{{ $akaun->kadar }}</td>
                <td>{{ $akaun->caj_perkhidmatan }}</td>
                <td>{{ $akaun->insurans }}</td>
                <td>{{ $akaun->jumlah_keseluruhan }}</td>
                <td>{{ $akaun->baki }}</td>
                <td>{{ $akaun->getStatus->nama }}</td>
            </tr>

        @empty
            <tr><td colspan="11">Tiada Data.</td></tr>

        @endforelse
        </tbody>
        </table>

    </div>
</div>