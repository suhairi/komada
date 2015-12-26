@extends('layouts.members')

@section('content')

    {{--<div class="row">--}}
        {{--<div class="col-xs-5">--}}

            {{--<div class="panel panel-primary">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h4>Carian Anggota</h4>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form method="post" action="{{ route('members.carian') }}">--}}
                        {{--@include('forms._carian')--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <h2>Maklumat Ahli</h2>

    @forelse($profiles as $profile)
        <ul class="nav nav-tabs">
            <li role="presentation" class="active">
                <a data-toggle="tab" href="#profil"><i class="glyphicon glyphicon-user"></i> Profil</a>
            </li>
            <li role="presentation"><a data-toggle="tab" href="#yuran"><i class="glyphicon glyphicon-credit-card"></i> Yuran</a></li>
            <li role="presentation"><a data-toggle="tab" href="#biasa"><i class="glyphicon glyphicon-usd"></i> Pinjaman</a></li>

        </ul>

        <div class="tab-content">
            <div id="profil" class="tab-pane fade in active">
                @include('profiles._profile')
            </div>
            <div id="yuran" class="tab-pane fade">
                @include('profiles._yuran')
            </div>
            <div id="biasa" class="tab-pane fade">
                @include('profiles._biasa')
            </div>
        </div>
    @empty
        <table class="table">
            <tbody>
            <tr>
                <td class="alert-danger">Tiada data.</td>
            </tr>
            </tbody>
        </table>
    @endforelse




@stop