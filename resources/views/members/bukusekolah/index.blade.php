@extends('layouts.members')


@section('content')

    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Pinjaman Buku Sekolah</h4></div>
                <div class="panel-body">

                    <form method="post" action="{{ route('members.bukusekolah.indexPost') }}">
                        @include('forms._carian')
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop