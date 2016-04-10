<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">KOMADA - e-Clerk</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('members.settings.tka') }}">TKA</a></li>
                <li><a href="{{ route('members.settings.pengguna') }}">Pengguna</a></li>
                @if(Auth::user()->email == 'suhairi81@gmail.com')
                    <!-- <li><a href="{{ route('members.admin.backup') }}">Backup</a></li> -->
                    <li><a href="{{ route('members.admin.todolist') }}">To do List</a></li>
                @endif
                <li><a href="{{ route('members.password') }}">Tukar Kata Laluan</a></li>
                <li><a href="{{ route('logout') }}">Logout <i class="glyphicon glyphicon-log-out"></i></a></li>
            </ul>
        </div>
    </div>
</nav>