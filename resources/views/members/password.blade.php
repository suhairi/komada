@extends('layouts.members')

@section('content')


    <div class="row">
        <div class="col-xs-4">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Tukar Password</h4></div>
                <div class="panel-body">

                    <form method="post" action="{{ route('members.password') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" readonly />
                        </div>

                        <div class="form-group">
                            <label for="username">Kata Laluan Semasa</label>
                            <input class="form-control" type="text" name="current" required="" />
                        </div>

                        <div class="form-group">
                            <label for="username">Kata Laluan</label>
                            <input class="form-control" type="password" name="password" required="" />
                        </div>

                        <div class="form-group">
                            <label for="username">Kata Laluan Sekali Lagi</label>
                            <input class="form-control" type="password" name="password_confirmation" required="" />
                        </div>

                        <div class="form-group" align="right">
                            @include('buttons._submit', ['value' => 'Tukar Kata Laluan'])
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>
@stop