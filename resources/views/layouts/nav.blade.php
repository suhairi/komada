<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">KOMADA - e-Accounting</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                {{--<li><a href="#">Dashboard</a></li>--}}
                {{--<li><a href="#">Settings</a></li>--}}
                <li><a href="{{ route('members.password') }}">Tukar Kata Laluan</a></li>
                <li><a href="{{ route('members.fakers') }}">*Faker Data - Yuran last 3 Years</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
            {{--<form class="navbar-form navbar-right">--}}
                {{--<input type="text" class="form-control" placeholder="Search...">--}}
            {{--</form>--}}
        </div>
    </div>
</nav>