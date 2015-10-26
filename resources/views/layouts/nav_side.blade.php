<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('members.index') }}"><i class="glyphicon glyphicon-search"></i> Carian Profil </a></li>
        <li><a href="{{ route('members.profiles.addUser') }}"><i class="glyphicon glyphicon-user"></i> Daftar Anggota</a></li>
        {{--<li><a href="{{ route('members.kadahli') }}"><i class="glyphicon glyphicon-paperclip"></i> Kad Ahli</a></li>--}}
        <li><a href="{{ route('members.calculator.pwt') }}"><i class="glyphicon glyphicon-paperclip"></i> Calculator PWT</a></li>
    </ul>

    <ul class="nav nav-sidebar">
        <li><a href="{{ route('members.yuran') }}"><i class="glyphicon glyphicon-credit-card"></i> Yuran</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-credit-card"></i> Pinjaman</a></li>
        <li class="dropdown-menu-left">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="glyphicon glyphicon-usd"></i> Pinjaman <span class="glyphicon glyphicon-menu-down"></span></a>
            <ul class="dropdown-menu">

                <li><a href="{{ route('members.pinjaman.index') }}">Pinjaman Biasa</a></li>
                <li><a href="{{ route('members.roadtax.index') }}">Cukai Jalan (Road Tax)</a></li>
                <li><a href="#">Insurans</a></li>
                <li><a href="#">Tayar / Bateri</a></li>
                <li><a href="#">Buku Sekolah</a></li>
            </ul>
        </li>
    </ul>



    <ul class="nav nav-sidebar">
        <li><a href="{{ route('members.laporan.carian') }}"><i class="glyphicon glyphicon-file"></i> Laporan Yuran</a></li>
        <li><a href="{{ route('members.laporan.yuran') }}"><i class="glyphicon glyphicon-file"></i> Laporan Yuran</a></li>
        <li><a href="{{ route('members.penyata.potongan') }}"><i class="glyphicon glyphicon-file"></i> Penyata Potongan</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-file"></i> Laporan Komisyen</a></li>
    </ul>


</div>