@extends('layouts.members')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-xs-6" id="global">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Global</h4></div>
                        <div class="panel-body">
                            <ul>
                                <li>+ function Batal Proses Yuran</li>
                                <li>+ function Batal Bayaran yuran, pertaruhan</li>
                                <li>+ function Backup</li>
                                <li>Favicon</li>
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
                                <li>Adakah Anggota yg masuk bulan semasa perlu terus byr yuran?</li>
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

    <script>
        $(document).ready(function () {
            $('.global').hide();
        });
    </script>


@stop
