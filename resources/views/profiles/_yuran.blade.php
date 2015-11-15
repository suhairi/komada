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
                <?php $total = 0.00; ?>
                <tr>
                    <td>{{ $yuran->bulan_tahun }}</td>
                    <td>{{ number_format($yuran->jumlah, 2) }}</td>

                    <td>
                        @foreach($yuranTambahan as $tambahan)
                            @if(strpos($yuran->bulan_tahun, $tambahan['bulan'] . '-') !== false)
                                {{ number_format($tambahan['jumlah'], 2) }} <br />
                                <?php $total += $tambahan['jumlah']; ?>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($yuranTambahan as $tambahan)
                            @if(strpos($yuran->bulan_tahun, $tambahan['bulan'] . '-') !== false)
                                {{ $tambahan['nama'] }} - {{ $tambahan['catatan'] }} <br />
                            @endif
                        @endforeach
                    </td>
                    <td>{{ number_format($total + $yuran->jumlah, 2) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>