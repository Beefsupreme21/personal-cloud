<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('games')->group(function () {
    Route::view('/', 'home');
    Route::view('/blackjack', 'games.blackjack');
    Route::view('/candyland', 'games.candyland');
    Route::view('/hangman', 'games.hangman');
    Route::view('/horse-racing', 'games.horse-racing');
    Route::view('/pokemon-quiz', 'games.pokemon-quiz');
    Route::view('/quiz', 'games.quiz');
    Route::view('/war', 'games.war');
    Route::view('/wheel-of-fortune', 'games.wheel-of-fortune');
});
