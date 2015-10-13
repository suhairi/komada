<div class="form-group">
    <label for="no_anggota">No Anggota</label>
    {!! Form::text('no_anggota', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<div class="form-group">
    <label for="nama">Nama </label>
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="nokp">No KP</label>
    {!! Form::text('nokp', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="email">Email</label>
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

@if($profile->status != 0)
    <div class="form-group">
        <label for="status">Status</label>
        {!! Form::select('status', $status, $profile->status, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="catatan">Catatan</label>
        {!! Form::textarea('catatan', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Sila isi jika mengubah status kepada TIDAK AKTIF. Contoh : BERSARA']) !!}
    </div>
@endif

<div class="form-group">
    <div align="right">
        @include('buttons._kemaskini')
    </div>
</div>