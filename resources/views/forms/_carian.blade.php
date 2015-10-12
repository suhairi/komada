<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
<table class="table">
    <tr>
        <th>No Anggota : </th>
        <td><input class="form-control" name="no_anggota" type="no_anggota" placeholder="No Anggota" autofocus="" /></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input class="btn btn-primary" type="submit" value="Cari" /></td>
    </tr>
</table>