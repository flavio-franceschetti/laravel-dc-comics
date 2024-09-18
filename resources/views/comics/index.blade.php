{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>Comics</h1>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
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
                            <a class="btn btn-primary" href="{{ route('comics.show', $comic) }}">Dettagli</a>
                            <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}">Modifica</a>
                            <form onsubmit="return confirm('Sicuro di voler eliminare?')" class="d-inline" method="POST"
                                action="{{ route('comics.destroy', $comic) }}">
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
