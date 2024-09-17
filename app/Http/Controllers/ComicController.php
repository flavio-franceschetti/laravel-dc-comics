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
        return view('users.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newComic = new Comic();
        // $newComic->title = $data['title'];
        // $newComic->thumb = $data['thumb'];
        // $newComic->price = $data['price'];
        // $newComic->sale_date = $data['sale_date'];
        // $newComic->type = $data['type'];
        // $newComic->series = $data['series'];
        // $newComic->description = $data['description'];
        // $newComic->slug = Helper::generateSlug($data['title'], Comic::class);

        $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        $newComic->fill($data);

        $newComic->save();

        return redirect()->route('users.show', $newComic->id)->with('success', 'elemento creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);

        return view('users.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);

        return view('users.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $comic = Comic::find($id);

        // condizione per generare un nuovo slug se il titolo cambia nella modifica
        if($data['title'] === $comic->title){
            $data['slug'] = $comic->slug;
        }else{
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }

        $comic->update($data);

        return redirect()->route('users.show', $comic->id)->with('success', 'elemento modificato con successo!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $comic = Comic::find($id);

        $comic->delete();
        return redirect()->route('users.index')->with('success', 'elemento eliminato con successo!');;
    }
}
