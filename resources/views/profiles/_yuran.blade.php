<div class="panel panel-info">
    <div class="panel-heading"><h4>Maklumat Yuran</h4></div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <tr>
                <th width="150"><div align="center"> Bulan / Tahun</div></th>
                <th width="150"><div align="right">Yuran (RM)</div></th>
                <th width="150"><div align="right">TKA (RM)</div></th>
                <th width="150"><div align="right">Takaful (RM)</div></th>
                <th width="150"><div align="right">Yuran Tambahan (RM)</div></th>
                <th><div align="center">Keterangan</div></th>
                <th width="150"><div align="center">JUMLAH</div></th>

            </tr>
            <?php $grandTotal = 0.00; ?>
            @foreach($yurans as $yuran)
                <?php $total = 0.00; ?>
                <tr>
                    <td align="center">{{ $yuran->bulan_tahun }}</td>
                    <td align="right">{{ number_format($yuran->yuran, 2) }}</td>
                    <td align="right">{{ number_format($yuran->tka, 2) }}</td>
                    <td align="right">{{ number_format($yuran->takaful, 2) }}</td>
                    <?php $total += $yuran->yuran + $yuran->tka + $yuran->takaful; ?>
                    <td align="right">
                        @foreach($yuranTambahan as $tambahan)
                            @if(strpos($yuran->bulan_tahun, $tambahan['bulan'] . '-') !== false)
                                {{ number_format($tambahan['jumlah'], 2) }} <br /><br />
                                <?php $total += $tambahan['jumlah']; ?>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <!-- looping for keterangan sumbangan tambahan -->
                        @foreach($yuranTambahan as $tambahan)
                            @if(strpos($yuran->bulan_tahun, $tambahan['bulan'] . '-') !== false)
                                <strong>{{ $tambahan['catatan'] }} </strong> - {{ $tambahan['nama'] }} <br />
                                (<strong>Penerima : </strong>{{ $tambahan['penerima'] }}) <br />
                            @endif
                        @endforeach
                    </td>
                    <td align="right">{{ number_format($total, 2) }}</td>
                    <?php $grandTotal += $total + $yuran->jumlah; ?>
                </tr>
            @endforeach
            <tr>
                <th colspan="6"><div align="right">JUMLAH</div></th>
                <td align="right">{{ number_format($grandTotal, 2) }}</td>
            </tr>
        </table>
    </div>
</div>