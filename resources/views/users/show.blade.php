@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Il fumetto</h1>
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
                <tr>
                    <td>{{ $comic->id }}</td>
                    <td><img class="thumb" src="{{ $comic->thumb }}" alt=""></td>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->price }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('users.show', $comic) }}">Dettagli</a>
                        <a class="btn btn-secondary" href="{{ route('users.index', $comic) }}">Torna indetro</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('footer')
