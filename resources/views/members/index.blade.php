@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Carian Profile Anggota</h4>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('members.carian') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <table class="table">
                            <tr>
                                <th>No Gaji : </th>
                                <td><input class="form-control" name="no_gaji" type="text" placeholder="No Anggota" autofocus="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"> </i> Cari..</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop