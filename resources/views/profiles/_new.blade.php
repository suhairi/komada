<div class="form-group">
    <label for="no_anggota">*No Anggota</label>
    {!! Form::text('no_anggota', $anggota['no_akhir'] + 1, ['class' => 'form-control', 'placeholder' => 'Contoh : 1432']) !!}
</div>

<div class="form-group">
    <label for="profile_category_id">*Kategori Ahli</label>
    {!! Form::select('profile_category_id', $category, null, ['class' => 'form-control', 'placeholder' => 'Kategori Ahli']) !!}
</div>

<div class="form-group">
    <label for="no_gaji">*No Gaji</label>
    {!! Form::text('no_gaji', null, ['class' => 'form-control', 'placeholder' => 'Contoh : 4132']) !!}
</div>

<div class="form-group">
    <label for="nama">*Nama</label>
    {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Contoh : Muhammad bin Abdullah']) !!}
</div>

<div class="form-group">
    <label for="nokp">*No KP</label>
    {!! Form::text('nokp', null, ['class' => 'form-control', 'placeholder' => 'Contoh : 850130025567']) !!}
</div>

<div class="form-group">
    <label for="jantina">*Jantina</label>
    {!! Form::select('jantina_id', ['1' => 'LELAKI', '2' => 'PEREMPUAN'], null, ['class' => 'form-control', 'placeholder' => 'JANTINA']) !!}
</div>

<div class="form-group">
    <label for="bangsa">*Bangsa</label>
    {!! Form::select('bangsa', ['MELAYU' => 'MELAYU', 'CINA' => 'CINA', 'INDIA' => 'INDIA', 'LAIN_LAIN' => 'LAIN-LAIN'], null,
    ['class' => 'form-control', 'placeholder' => 'BANGSA']) !!}
</div>

<div class="form-group">
    <label for="no_anggota">Email</label>
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Contoh : email@example.com']) !!}
</div>

<div class="form-group">
    <label for="alamat1">Alamat 1</label>
    {!! Form::text('alamat1', null, ['class' => 'form-control', 'placeholder' => 'Contoh : IBU PEJABAT MADA']) !!}
</div>

<div class="form-group">
    <label for="alamat2">Alamat 2</label>
    {!! Form::text('alamat2', null, ['class' => 'form-control', 'placeholder' => 'Contoh : AMPANG JAJAR, ALOR SETAR']) !!}
</div>

<div class="form-group">
    <label for="taraf_jawatan">Gred Jawatan</label>
    {!! Form::text('taraf_jawatan', null, ['class' => 'form-control', 'placeholder' => 'Contoh : W41']) !!}
</div>

<div class="form-group">
    <label for="jawatan">Jawatan</label>
    {!! Form::text('jawatan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: Pegawai Pertanian ']) !!}
</div>

<div class="form-group">
    <label for="tarikh khidmat">Tarikh Khidmat</label>
    {!! Form::date('tarikh_khidmat', null, ['class' => 'form-control']) !!}
</div>



<div class="form-group">
    <label for="jumlah">*Jumlah Potongan Yuran Bulanan (RM)</label>
    {!! Form::number('jumlah_yuran_bulanan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 10.00', 'min' => '0', 'step' => 'any']) !!}
</div>

<div class="form-group">
    <label for="zon">*Zon Gaji</label>
    {!! Form::select('zon_gaji_id', $zon_gaji, null, ['class' => 'form-control', 'placeholder' => 'Zon Gaji']) !!}
</div>

    {!! Form::hidden('status', 1, null) !!}
    {!! Form::hidden('tarikh_ahli', \Carbon\Carbon::now()->format('Y'), null) !!}

<div class="form-group" align="right">
    @include('buttons._submit', ['value' => 'Daftar Anggota baru'])
</div>