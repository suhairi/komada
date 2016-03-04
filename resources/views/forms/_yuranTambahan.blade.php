{!! Form::open(['route' => 'members.yurantambahan', 'method' => 'post']) !!}
    <div class="form-group">
        <label for="bulan_tahun">Bulan / Tahun</label>
        {!! Form::text('bulan_tahun', Carbon\Carbon::now()->format('m-Y'), ['class' => 'form-control', 'placeholder' => 'Contoh : 01-2015']) !!}
    </div>
    <div class="form-group">
        <label for="bulan_tahun">Keterangan Sumbangan</label>
        {!! Form::select('sumbangan_id', $sumbangan, null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Jenis Sumbangan']) !!}
    </div>

    <div class="form-group">
        <label for="Anggota ID">No Gaji Anggota</label>
        {!! Form::text('no_gaji', null, ['class' => 'form-control', 'placeholder' => 'Contoh : 3374']) !!}
    </div>

    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        {!! Form::number('jumlah', null, ['class' => 'form-control', 'placeholder' => 'Contoh : 10.00']) !!}
    </div>

    <div class="form-group">
        <label for="tarikhKematian">Tarikh Kematian / Bencana / Daftar IPT</label>
        {!! Form::date('tarikh', null, ['class' => 'form-control', 'placeholder' => 'Contoh : 10.00']) !!}
    </div>



    <div class="form-group">
        <label for="Nama Penerima">Nama Penerima</label>
        {!! Form::text('penerima', null, ['class' => 'form-control', 'placeholder' => 'Contoh : Ahmad bin Abdullah']) !!}
    </div>

    <div align="right">
        @include('buttons._submit', ['value' => "Daftar Sumbangan"])
    </div>
{!! Form::close() !!}