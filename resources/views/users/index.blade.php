{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>Comics</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Thumb</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td><img class="thumb" src="{{ $comic->thumb }}" alt=""></td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td><a class="btn btn-primary" href="{{ route('users.show', $comic) }}">Dettagli</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('titlePage')
    HOME
@endsection
