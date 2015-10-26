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
                                <li>Favicon</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Settings</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li><strike>+ tka</strike></li>
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
                                <li><strike>During register, add jumlah potongan yuran, profile category id, zon gaji.</strike></li>
                                <li><strike>After Carian Profile, yuran tab does not list along sumbngan lain.</strike></li>
                                <li><strike>Kemaskini profil tak update jantina</strike></li>
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
                                <li><strike>Jadual Pembayaran Pinjaman Wang Tunai (calculator) First Timer Loan</strike></li>
                                <li>Jadual Pembayaran Pinjaman Wang Tunai (calculator) Overlap Loan</li>
                                <li>Semakan calculator first time loan dgn Kak Zah</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xs-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Laporan</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>Laporan Potongan Gaji mengikut Zon</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Seeders</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>Nilai awal baki bawa ke hadapan</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

        </div>


@stop
