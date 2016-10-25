<div class="form-group">
    <label for="no_anggota">No Gaji</label>
    {!! Form::text('no_gaji', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>

<div class="form-group">
    <label for="no_anggota">No Anggota</label>
    {!! Form::text('no_anggota', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="nama">Nama </label>
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="nokp">No KP</label>
    {!! Form::text('nokp', null, ['class' => 'form-control']) !!}
</div>

{{-- TMABAHAN 18102016 --}}
<div class="form-group">
    <label for="nokp">Alamat 1</label>
    {!! Form::text('alamat1', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>
<div class="form-group">
    <label for="nokp">Alamat 2</label>
    {!! Form::text('alamat2', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>




<div class="form-group">
    <label for="jantina">Jantina</label>
    {!! Form::select('jantina_id', $jantina, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="email">Email</label>
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="jumlah">*Jumlah Potongan Yuran Bulanan (RM)</label>
    {!! Form::number('jumlah_yuran_bulanan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 10.00', 'min' => '0', 'step' => 'any']) !!}
</div>

<div class="form-group">
    <label for="jumlah">Jumlah Pertaruhan</label>
    {!! Form::number('jumlah_pertaruhan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 10.00', 'min' => '0', 'step' => 'any']) !!}
</div>

<div class="form-group">
    <label for="zon">Zon Pembayaran Gaji</label>
    {!! Form::select('zon_gaji_id', $zon, null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    <label for="status">Status</label>
    {!! Form::select('status', $status, $profile->status, ['class' => 'form-control', 'id' => 'status']) !!}
</div>

<div class="form-group" id="catatan">
    <label for="catatan">*Catatan</label>
    {!! Form::textarea('catatan', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Sila isi jika mengubah status kepada TIDAK AKTIF. Contoh : BERSARA']) !!}
</div>


<div class="form-group">
    <div align="right">
        @include('buttons._kemaskini', ['value' => 'Kemaskini Profile'])
    </div>
</div>

<script>

    $('#catatan').hide();

    $(function(){

        $('#status').change(function() {
            $('#catatan').show();
        });

    });
</script>