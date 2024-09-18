<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

     // dentro la funzione pubblica rules inserisco tutti i controlli
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:150',
            'description' => 'min:10|max:255',
            'thumb' => 'required|min:10|max:255',
            'price' => 'required|max:5',
            'series' => 'required|min:3|max:50',
            'sale_date' => 'required|date',
            'type' => 'required|min:3|max:50',
        ];

    }

    // dentro la funzione messages inserisco tutti i messaggi personalizzati de mostrare a schermo
    public function messages()
    { 
        return [
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
        ];
    }
}
