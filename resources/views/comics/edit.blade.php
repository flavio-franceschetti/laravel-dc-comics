@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>Modifica "{{ $comic->title }}"</h1>
        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" value="{{ $comic->title }}" type="text" class="form-control" id="title">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb src</label>
                <input name="thumb" value="{{ $comic->thumb }}" type="text" class="form-control" id="thumb">
                @error('thumb')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" value="{{ $comic->price }}" type="text" class="form-control" id="price">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_sale" class="form-label">Data di vendita</label>
                <input name="sale_date" value="{{ $comic->sale_date }}" type="text" class="form-control" id="date_sale">
                @error('date_sale')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input name="series" value="{{ $comic->series }}" type="text" class="form-control" id="series">
                @error('series')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input name="type" value="{{ $comic->type }}" type="text" class="form-control" id="type">
                @error('type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description">{{ $comic->description }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </form>
    </div>
@endsection
