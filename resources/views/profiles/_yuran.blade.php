@if($yurans)

    {{--{{ dd($yurans) }}--}}

    <div class="panel panel-info">
        <div class="panel-heading"><h5>Maklumat Anggota</h5></div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th width="150">Bulan / Tahun</th>
                    <th width="150">Jumlah (RM)</th>
                    <th width="150">Yuran Tambahan (RM)</th>
                    <th width="150">JUMLAH</th>

                </tr>

    @forelse($yurans as $yuran)

        {{--{{ dd($yuran->yuranTambahan) }}--}}
        <tr>
            <td>{{ $yuran->bulan_tahun }}</td>
            <td>{{ number_format($yuran->jumlah, 2) }}</td>
            <td>{{ number_format($yuran->yuran_tambahan, 2) }}</td>
            <td>{!! number_format($yuran->jumlah, 2) !!}</td>

        </tr>
    @empty
        <tr>
            <td colspan="4" class="alert-warning">Tiada data.</td>
        </tr>
    @endforelse
@endif

            </table>
        </div>
    </div>
