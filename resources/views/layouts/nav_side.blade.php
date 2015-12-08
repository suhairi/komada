<div class="col-sm-3 col-md-2 sidebar">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-search"></i> Profil
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('members.index') }}"><i class="glyphicon glyphicon-search"></i> Carian Profil </a></li>
                    <li><a href="{{ route('members.profiles.addUser') }}"><i class="glyphicon glyphicon-user"></i> Daftar Anggota</a></li>
                    <li><a href="{{ route('members.pertaruhan.index') }}"><i class="glyphicon glyphicon-paperclip"></i> Daftar Pertaruhan</a></li>
                </ul>
            </li>
        </ul>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-usd"></i> Pinjaman
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('members.calculator.pwt') }}"><i class="glyphicon glyphicon-usd"></i> Pinjaman Wang Tunai</a></li>
                    <li><a href="{{ route('members.bukusekolah.index') }}"><i class="glyphicon glyphicon-usd"></i> Buku Sekolah</a></li>
                    <li><a href="{{ route('members.kecemasan.index') }}"><i class="glyphicon glyphicon-usd"></i> Kecemasan</a></li>
                    <li><a href="{{ route('members.tayar.index') }}"><i class="glyphicon glyphicon-usd"></i> Tayar / Bateri</a></li>
                    <li><a href="{{ route('members.jalan.index') }}"><i class="glyphicon glyphicon-usd"></i> Cukai Jalan</a></li>
                    <li><a href="{{ route('members.insurans.index') }}"><i class="glyphicon glyphicon-usd"></i> Insurans</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-credit-card"></i> Bayaran
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('members.yuran.index') }}"><i class="glyphicon glyphicon-credit-card"></i> Yuran</a></li>
                    <li><a href="{{ route('members.yuran.index') }}"><i class="glyphicon glyphicon-credit-card"></i> Langsai</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-file"></i> Laporan
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('members.laporan.lapGajiIndividu') }}"><i class="glyphicon glyphicon-file"></i> Potongan Gaji Individu</a></li>
                    <li><a href="{{ route('members.laporan.yuran') }}"><i class="glyphicon glyphicon-file"></i> Laporan Yuran</a></li>
                    <li><a href="{{ route('members.penyata.potongan') }}"><i class="glyphicon glyphicon-file"></i> Penyata Potongan</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-file"></i> Laporan Komisyen</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>