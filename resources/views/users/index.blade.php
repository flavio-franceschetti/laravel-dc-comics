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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td><img class="thumb" src="{{ $comic->thumb }}" alt="{{ $comic->title }}"></td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('users.show', $comic) }}">Dettagli</a>
                            <a class="btn btn-warning" href="{{ route('users.edit', $comic) }}">Modifica</a>
                            <form onsubmit="return confirm('Sicuro di voler eliminare?')" class="d-inline" method="POST"
                                action="{{ route('users.destroy', $comic) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('titlePage')
    HOME
@endsection
