<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="{{ route('members.index') }}">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="{{ route('members.addUser') }}">Daftar Anggota</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Export</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('members.yuran') }}">Yuran</a></li>
        <li class="dropdown-menu-left">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Pinjaman <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#">Pinjaman Biasa</a></li>
                <li><a href="#">Insurans</a></li>
                <li><a href="#">Tayar / Bateri</a></li>
                <li><a href="#">Buku Sekolah</a></li>
                {{--<li role="separator" class="divider"></li>--}}
                {{--<li><a href="#">Separated link</a></li>--}}
                {{--<li role="separator" class="divider"></li>--}}
                {{--<li><a href="#">One more separated link</a></li>--}}
            </ul>
        </li>
        {{--<li><a href="">One more nav</a></li>--}}
        {{--<li><a href="">Another nav item</a></li>--}}
        {{--<li><a href="">More navigation</a></li>--}}
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('members.laporan.carian') }}">Laporan Yuran</a></li>
        <li><a href="{{ route('members.laporan.yuran') }}">Laporan Yuran</a></li>
        <li><a href="#">Laporan Pinjaman</a></li>
        <li><a href="#">Laporan Komisyen</a></li>
    </ul>
</div>