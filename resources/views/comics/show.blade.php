@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Il fumetto</h1>
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
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $comic->id }}</td>
                    <td><img class="thumb" src="{{ $comic->thumb }}" alt=""></td>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->price }}</td>
                    <td>{{ $comic->slug }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('comics.index', $comic) }}">Torna indetro</a>
                        <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}">Modifica</a>
                        {{-- creo un form per il tasto delete perche devo usare il metodo delete che html non supporta quindi metto il form in POST e poi con blade gli passo il @method DELETE, poi con onsubmit inserisco un semplice controllo per confermare l'eliminazione --}}
                        <form onsubmit="return confirm('Sicuro di voler eliminare?')" class="d-inline" method="POST"
                            action="{{ route('comics.destroy', $comic) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('footer')
