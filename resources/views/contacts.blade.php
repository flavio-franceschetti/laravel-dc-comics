{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
<div class="container my-5">
    <h1>Scrivici</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo modi, iusto dolore eaque laudantium optio, adipisci perspiciatis voluptate obcaecati sit perferendis natus velit ut! Tempora voluptatum ipsam modi rem voluptas.
    </p>
</div>

@endsection

@section('titlePage')
    contatti
@endsection

@section('hero')
    <div>HERO CONTACTS</div>
@endsection
