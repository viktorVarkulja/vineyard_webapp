@extends('layouts.admin')

@section('content')

    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-header">
            Dobrodošli
        </div>
        <ul class="list-group list-group-flush">
            <a class="list-group-item" href="{{ route('wine.index') }}">Vino</a>
            <a class="list-group-item" href="{{ route('grape.index') }}">Grožđe</a>
            <a class="list-group-item" href="{{ route('bottle.index') }}">Flaše</a>
            <a class="list-group-item" href="{{ route('user.index') }}">Korisnik</a>
            <a class="list-group-item" href="{{ route('reciept.index') }}">Račun</a>
        </ul>
    </div>

@endsection