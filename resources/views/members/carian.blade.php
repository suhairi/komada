@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Carian Anggota</h4>
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
                                <td colspan="2" align="right"><input class="btn btn-primary" type="submit" value="Cari" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($profiles)
        @forelse($profiles as $profile)
            <ul class="nav nav-tabs">
                <li role="presentation" class="active">
                    <a data-toggle="tab" href="#home"><i class="glyphicon glyphicon-user"></i>Profil</a>
                </li>
                <li role="presentation"><a data-toggle="tab" href="#menu1">Yuran</a></li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Pinjaman <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a data-toggle="tab" href="#menu2"> Insurans</a></li>
                        <li role="presentation"><a href="#">Tayar / Bateri</a></li>
                        <li role="presentation"><a href="#">Buku Sekolah</a></li>
                    </ul>
                </li>
            </ul>
        @empty
            <table class="table">
                <thead>
                <tr>
                    <th>No Anggota</th>
                    <th>Nama</th>
                    <th>No KP</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Tiada data.</td>
                </tr>
                </tbody>
            </table>
        @endforelse
    @endif

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            @include('profiles._profile')
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Some content in menu 1.</p>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
        </div>
    </div>


@stop