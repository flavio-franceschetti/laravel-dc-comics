@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>New Comic</h1>

        {{-- @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb src</label>
                <input name="thumb" value="{{ old('thumb') }}" type="text" class="form-control" id="thumb">
                @error('thumb')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" value="{{ old('price') }}" type="text" class="form-control" id="price">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_sale" class="form-label">Data di vendita</label>
                <input name="sale_date" value="{{ old('sale_date') }}" type="text" class="form-control" id="date_sale">
                @error('date_sale')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input name="series" value="{{ old('series') }}" type="text" class="form-control" id="series">
                @error('series')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input name="type" value="{{ old('type') }}" type="text" class="form-control" id="type">
                @error('type')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </form>
    </div>
@endsection
