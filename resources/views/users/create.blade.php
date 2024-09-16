@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <h1>New Comic</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" type="text" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb src</label>
                <input name="thumb" type="text" class="form-control" id="thumb">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="text" class="form-control" id="price">
            </div>
            <div class="mb-3">
                <label for="date_sale" class="form-label">Data di vendita</label>
                <input name="sale_date" type="text" class="form-control" id="date_sale">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input name="series" type="text" class="form-control" id="series">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input name="type" type="text" class="form-control" id="type">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </form>
    </div>
@endsection
