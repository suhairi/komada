@extends('layouts.mystyle')

@section('content')

<button class="btn"><a href="{{ route('members.index') }}">Home</a></button>
<div class="dropdown">

    <button class="btn">Dropdown</button>
    <div class="dropdown-content">
        <a href="{{ route('members.index') }}">Sub 1</a>
        <a href="#">Sub 2</a>
        <a href="#">Sub 3</a>
    </div>
</div>
<div class="dropdown">
    <button class="btn"><a href="#">Products</a></button>
    <div class="dropdown-content">
        <a href="#">Product 1</a>
        <a href="#">Product 2</a>
        <a href="#">Product 3</a>
        <a href="#">Product 4</a>
        <a href="#">Product 5</a>
    </div>

</div>

@stop