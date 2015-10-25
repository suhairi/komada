@extends('layouts.members')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Global</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>+ function Batal Proses Yuran</li>
                                <li>+ function Backup</li>
                                <li>icons</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Settings</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>+ tka</li>
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
                                <li>During register, add jumlah potongan yuran, profile category id, zon gaji.</li>
                                <li>After Carian Profile, yuran tab does not list along sumbngan lain. </li>
                                <li>Kemaskini profil tak update jantina</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Yuran & Sumbangan Tambahan</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>Before sumbangan tambahan -> check wether the no_gaji exists</li>
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
                                <li>Jadual Pembayaran Pinjaman Wang Tunai (calculator)</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Seeder 1</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>Nilai awal baki bawa ke hadapan</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Seeder 2</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Seeder 3</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
@stop
