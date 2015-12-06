<div class="col-sm-3 col-md-2 sidebar">

    <div class="dropdown">
        <div class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Profile
            <span class="caret"></span>
        </div>
        <ul class="nav nav-sidebar dropdown-menu">
            <li><a href="{{ route('members.index') }}"><i class="glyphicon glyphicon-search"></i> Carian Profil </a></li>
            <li><a href="{{ route('members.profiles.addUser') }}"><i class="glyphicon glyphicon-user"></i> Daftar Anggota</a></li>
            <li><a href="{{ route('members.pertaruhan.index') }}"><i class="glyphicon glyphicon-paperclip"></i> Daftar Pertaruhan</a></li>
        </ul>
    </div>
    <br />

    <div class="dropdown">
        <div class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Pinjaman
            <span class="caret"></span>
        </div>
        <ul class="nav nav-sidebar dropdown-menu">
            <li><a href="{{ route('members.calculator.pwt') }}"><i class="glyphicon glyphicon-usd"></i> Pinjaman Wang Tunai</a></li>
            <li><a href="{{ route('members.bukusekolah.index') }}"><i class="glyphicon glyphicon-usd"></i> Buku Sekolah</a></li>
            <li><a href="{{ route('members.kecemasan.index') }}"><i class="glyphicon glyphicon-usd"></i> Kecemasan</a></li>
            <li><a href="{{ route('members.tayar.index') }}"><i class="glyphicon glyphicon-usd"></i> Tayar / Bateri</a></li>
            <li><a href="{{ route('members.jalan.index') }}"><i class="glyphicon glyphicon-usd"></i> Cukai Jalan</a></li>
            <li><a href="{{ route('members.insurans.index') }}"><i class="glyphicon glyphicon-usd"></i> Insurans</a></li>
        </ul>
    </div>
    <br/>

    <div class="dropdown">
        <div class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Proses Yuran
            <span class="caret"></span>
        </div>
        <ul class="nav nav-sidebar dropdown-menu">
            <li><a href="{{ route('members.yuran.index') }}"><i class="glyphicon glyphicon-credit-card"></i> Yuran</a></li>
        </ul>
    </div>
    <br />

    <div class="dropdown">
        <div class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Laporan
            <span class="caret"></span>
        </div>
        <ul class="nav nav-sidebar dropdown-menu">
            <li><a href="{{ route('members.laporan.potonganGaji') }}"><i class="glyphicon glyphicon-file"></i> Laporan Potongan Gaji</a></li>
            <li><a href="{{ route('members.laporan.yuran') }}"><i class="glyphicon glyphicon-file"></i> Laporan Yuran</a></li>
            <li><a href="{{ route('members.penyata.potongan') }}"><i class="glyphicon glyphicon-file"></i> Penyata Potongan</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-file"></i> Laporan Komisyen</a></li>
        </ul>
    </div>



</div>