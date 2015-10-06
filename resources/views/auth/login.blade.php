@extends('layouts.login')


@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12">
                <br /><br /><br /><br /><br />
            </div>
        </div>

        <div class="row">

            <div class="col-xs-4">
                &nbsp;
            </div>
            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Log Masuk - KOMADA</h4>
                    </div>

                    <div class="panel-body">

                        <form method="post" action="{{ route('authenticate') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input class="form-control" type="email" required="" name="email"/>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input class="form-control" type="password" required="" name="password"/>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Log Masuk" />
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


@stop