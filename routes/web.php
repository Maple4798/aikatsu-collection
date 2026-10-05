<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cards', [CardController::class, 'index'])->name('cards.index');

Route::get('/cards/{card}', [CardController::class, 'show'])
    ->name('cards.show');


Route::post('/cards/{card}/increment', [CardController::class, 'increment'])
    ->name('cards.increment');

Route::post('/cards/{card}/decrement', [CardController::class, 'decrement'])
    ->name('cards.decrement');