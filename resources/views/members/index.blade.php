@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Carian Anggota...</h4>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{ route('members.carian') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <table class="table">
                            <tr>
                                <th>No Anggota : </th>
                                <td><input class="form-control" name="no_anggota" type="no_anggota" placeholder="No Anggota" autofocus="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"> </i> Cari</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop