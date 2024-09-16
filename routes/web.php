<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $title = 'Layout base - HOME';
    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo modi, iusto dolore eaque laudantium optio, adipisci perspiciatis voluptate obcaecati sit perferendis natus velit ut! Tempora voluptatum ipsam modi rem voluptas.';
    return view('home', compact('text', 'title'));
})->name('home');

Route::get('/chi-siamo', function () {
    return view('about');
})->name('about');

Route::get('/contatti', function () {
    return view('contacts');
})->name('contacts');
