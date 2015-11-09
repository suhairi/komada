<div class="panel panel-info">
    <div class="panel-heading"><h4>Maklumat Yuran</h4></div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <tr>
                <th width="150">Bulan / Tahun</th>
                <th width="150">Jumlah (RM)</th>
                <th width="150">Yuran Tambahan (RM)</th>
                <th>Catatan</th>
                <th width="150">JUMLAH</th>

            </tr>
            @foreach($yurans as $yuran)
                <tr>
                    <td>{{ $yuran->bulan_tahun }}</td>
                    <td>{{ number_format($yuran->jumlah, 2) }}</td>
                    <td>
                        @foreach($yuranTambahans as $yuranTambahan)
                            {{ number_format($yuranTambahan->jumlah, 2) }} <br />
                            <?php $total += $yuranTambahan->jumlah; ?>
                        @endforeach
                    </td>
                    <td>
                        @foreach($yuranTambahans as $yuranTambahan)
                            {{ $yuranTambahan->nama }} - {{ $yuranTambahan->catatan }} <br />
                        @endforeach
                    </td>
                    <td>{{ number_format($total + $yuran->jumlah, 2) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>