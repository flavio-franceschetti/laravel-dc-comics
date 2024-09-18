<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\functions\Helper;
use Illuminate\Support\Facades\Redirect;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderBy('id', 'desc')->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:150',
            'description' => 'min:10|max:255',
            'thumb' => 'required|min:10|max:255',
            'price' => 'required|max:5',
            'series' => 'required|min:3|max:50',
            'sale_date' => 'required|date',
            'type' => 'required|min:3|max:50',
        ], [
            'title.required' => 'Il campo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri.',
            'title.max' => 'Il titolo deve avere massimo :max caratteri.',
            'description.min'=> 'La descrizione deve avere almeno :min caratteri.',
            'description.max'=> 'La descrizione deve avere massimo :max caratteri.',
            'thumb.required' => 'Il campo è obbligatorio',
            'thumb.min' => 'L\'url deve avere almeno :min caratteri.',
            'thumb.max' => 'L\'url deve avere massimo :max caratteri.',
            'price.required' => 'Il campo è obbligatorio',
            'price.max' => 'Il prezzo de ve avere massimo :max caratteri.',
            'series.required' => 'Il campo è obbligatorio',
            'series.min' => 'La serie deve avere almeno :min caratteri.',
            'series.max' => 'La serie deve avere massimo :max caratteri.',
            'sale_date.required' => 'Il campo è obbligatorio',
            'sale_date.date' => 'La data deve essere una data Y/m/d',
            'type.required' => 'Il campo è obbligatorio',
            'type.min' => 'Il tipo deve avere almeno :min caratteri.',
            'type.max' => 'Il tipo deve avere massimo :max caratteri.',
        ]);

        $data = $request->all();

        $newComic = new Comic();

        $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        $newComic->fill($data);

        $newComic->save();

        return redirect()->route('comics.show', $newComic->id)->with('success', 'elemento creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::find($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        // $comic = Comic::find($id);

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        // $comic = Comic::find($id);

        // condizione per generare un nuovo slug se il titolo cambia nella modifica
        if($data['title'] === $comic->title){
            $data['slug'] = $comic->slug;
        }else{
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }

        $comic->update($data);

        return redirect()->route('comics.show', $comic->id)->with('success', 'elemento modificato con successo!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {

        // $comic = Comic::find($id);

        $comic->delete();
        return redirect()->route('comics.index')->with('success', 'elemento eliminato con successo!');;
    }
}
