@if($yurans)

    {{--{{ dd($yurans) }}--}}

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

    @forelse($yurans as $yuran)
        <tr>
            <td>{{ $yuran->bulan_tahun }}</td>
            <td>{{ number_format($yuran->jumlah, 2) }}</td>
            <td>{{ number_format($yuran->yuranTambahan->jumlah, 2) }}</td>
            <td>{{ $yuran->yuranTambahan->nama }} <br /> <strong> {{ $yuran->yuranTambahan->catatan }}</strong></td>
            <td>{{ number_format($yuran->jumlah + $yuran->yuranTambahan->jumlah, 2) }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="alert-danger">Tiada data.</td>
        </tr>
    @endforelse
@endif

            </table>
        </div>
    </div>
