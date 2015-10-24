@extends('layouts.members')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-xs-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Global</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>+ function Batal Proses Yuran</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Anggota</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>During register, add jumlah potongan yuran, profile catefory id.</li>
                                <li>After Carian Profile, yuran tab does not list along sumbngan lain. </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Yuran & Sumbangan Tambahan</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>After sumbangan tambahan -> the status of the profile with no_gaji should be inactive</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Pinjaman Wang Tunai</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li><strike>Daftar Anggota - +attribute jumlah potongan yuran bulanan</strike></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
@stop
