<form method="post" action="{{ route('members.yurantambahan') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="bulan_tahun">Bulan / Tahun</label>
        <input class="form-control" type="text" name="bulan_tahun" value="{{ Carbon\Carbon::now()->format('m-Y') }}" placeholder="Contoh: 01/2015" />
    </div>
    <div class="form-group">
        <label for="bulan_tahun">Keterangan Sumbangan</label>
        <input class="form-control" type="text" name="nama" placeholder="Contoh: Sumbangan Kematian" />
    </div>
    <div class="form-group">
        <label for="bulan_tahun">Jumlah</label>
        <input class="form-control" type="text" name="jumlah" value="10.00" placeholder="Contoh: 10.00" />
    </div>
    <div class="form-group">
        <label for="bulan_tahun">Catatan</label>
        <input class="form-control" type="text" name="catatan" placeholder="Contoh: En. Ali bin Abu" />
    </div>

    <div align="right">
        @include('buttons._submit', ['value' => "Daftar Yuran Tambahan"])
    </div>
</form>