<div class="form-group">
    <label for="no_anggota">No Anggota</label>
    {!! Form::text('no_anggota', $anggota['no_akhir'] + 1, ['class' => 'form-control', 'placeholder' => 'Contoh : 132']) !!}
</div>

<div class="form-group">
    <label for="nama">Nama</label>
    {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Contoh : ALI b ABU']) !!}
</div>

<div class="form-group">
    <label for="nokp">No KP</label>
    {!! Form::text('nokp', null, ['class' => 'form-control', 'placeholder' => 'Contoh : 850130025567']) !!}
</div>

<div class="form-group">
    <label for="jantina">Jantina</label>
    {!! Form::select('no_anggota', ['L' => 'LELAKI', 'P' => 'PEREMPUAN'], null, ['class' => 'form-control', 'placeholder' => 'JANTINA']) !!}
</div>

<div class="form-group">
    <label for="bangsa">Bangsa</label>
    {!! Form::select('no_anggota', ['MELAYU' => 'MELAYU', 'CINA' => 'CINA', 'INDIA' => 'INDIA', 'LAIN_LAIN' => 'LAIN-LAIN'], null,
    ['class' => 'form-control', 'placeholder' => 'BANGSA']) !!}
</div>

<div class="form-group">
    <label for="no_anggota">Email</label>
    {!! Form::text('no_anggota', null, ['class' => 'form-control', 'placeholder' => 'Contoh : email@example.com']) !!}
</div>

<div class="form-group">
    <label for="alamat1">Alamat 1</label>
    {!! Form::text('no_anggota', null, ['class' => 'form-control', 'placeholder' => 'Contoh : IBU PEJABAT MADA']) !!}
</div>

<div class="form-group">
    <label for="alamat2">Alamat 2</label>
    {!! Form::text('no_anggota', null, ['class' => 'form-control', 'placeholder' => 'Contoh : AMPANG JAJAR, ALOR SETAR']) !!}
</div>

<div class="form-group">
    <label for="taraf_jawatan">Gred Jawatan</label>
    {!! Form::text('no_anggota', null, ['class' => 'form-control', 'placeholder' => 'Contoh : W41']) !!}
</div>

<div class="form-group">
    <label for="jawatan">Jawatan</label>
    {!! Form::text('no_anggota', null, ['class' => 'form-control', 'placeholder' => 'Contoh: Pegawai Pertanian ']) !!}
</div>

<div class="form-group" align="right">
    @include('buttons._submit', ['value' => 'Daftar Anggota baru'])
</div>