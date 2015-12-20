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
                    <li><a href="{{ route('members.laporan.lapPotonganGaji') }}"><i class="glyphicon glyphicon-file"></i> Penyata Potongan</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-file"></i> Laporan Komisyen</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'><span>Home</span></a></li>
            <li class='has-sub'><a href='#'><span>Profil</span></a>
                <ul>
                    <li><a href='#'><span>Carian Profil</span></a></li>
                    <li><a href='#'><span>Daftar Anggota</span></a></li>
                    <li class='last'><a href='#'><span>Daftar Pertaruhan</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='#'><span>Pinjaman</span></a>
                <ul>
                    <li><a href='#'><span>Wang Tunai</span></a></li>
                    <li class='last'><a href='#'><span>Buku Sekolah</span></a></li>
                    <li class='last'><a href='#'><span>Kecemasan</span></a></li>
                    <li class='last'><a href='#'><span>Tayar / Bateri</span></a></li>
                    <li class='last'><a href='#'><span>Cukai Jalan</span></a></li>
                    <li class='last'><a href='#'><span>Insurans</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='#'><span>Bayaran</span></a>
                <ul>
                    <li class='last'><a href='#'><span>Yuran</span></a></li>
                    <li class='last'><a href='#'><span>Bayaran Tunai</span></a></li>
                    <li class='last'><a href='#'><span>Langsai</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='#'><span>Laporan</span></a>
                <ul>
                    <li class='last'><a href='#'><span>Potongan Gaji Individu</span></a></li>
                    <li class='last'><a href='#'><span>Laporan Yuran</span></a></li>
                    <li class='last'><a href='#'><span>Penyata Potongan</span></a></li>
                    <li class='last'><a href='#'><span>Laporan Komisyen</span></a></li>
                </ul>
            </li>

        </ul>
    </div>


</div>