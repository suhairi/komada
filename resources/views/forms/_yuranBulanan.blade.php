<form method="post" action="{{ Route('members.yuran.process') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="form-group">
        <label for="bulan_tahun">Bulan / Tahun</label>
        <input class="form-control" type="text" name="bulan_tahun" value="{{ Carbon\Carbon::now()->format('m-Y') }}" autocomplete="off" placeholder="Contoh: 01/2015" />
    </div>

    <div align="right">
        @include('buttons._submit-progress', ['value' => 'Proses Bayaran Bulanan'])
    </div>
</form>

