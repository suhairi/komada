{{ csrf_field() }}
<table class="table">
    <tr>
        <th>No Gaji : </th>
        <td><input class="form-control" name="no_gaji" type="text" placeholder="No Gaji" autofocus="" required="" autocomplete="off" /></td>
    </tr>
    <tr>

        <td colspan="2" align="right">
            @include('buttons._cari')
            {{--<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"> </i> Cari </button>--}}
        </td>
    </tr>
</table>