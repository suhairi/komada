
<div class="row">

    <div class="col-xs-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Overlap</h4></div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="jumlah">Jumlah Pinjaman</label>
                    <input class="form-control" type="text"/>
                </div>

                <div class="form-group">
                    <label for="tempoh">Tempoh</label>
                    <input class="form-control" type="number"/>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xs-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Maklumat Pinjaman</h4></div>
            <div class="panel-body">
                <table class="table table-condensed table-striped">
                    <tr>
                        <th>Baki Pinjaman</th>
                        <td align="right">RM {{ number_format($info[0], 2) }} / {{ number_format($akaun->jumlah_keseluruhan, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Baki Tempoh</th>
                        <td align="right">{{ $info[1] }} / {{ $akaun->tempoh }} bulan</td>
                    </tr>
                    <tr>
                        <th>Jumlah Langsai</th>
                        <td align="right">RM {{ number_format($info[2], 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>