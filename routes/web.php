<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test');
});

Route::prefix('directives')->group(function () {
    Route::view('/x-data', 'methods.x-data');
    Route::view('/x-bind', 'methods.x-bind');
    Route::view('/x-on', 'methods.x-on');
    Route::view('/x-text', 'methods.x-text');
    Route::view('/x-html', 'methods.x-html');
    Route::view('/x-model', 'methods.x-model');
    Route::view('/x-show', 'methods.x-show');
    Route::view('/x-transition', 'methods.x-transition');
    Route::view('/x-for', 'methods.x-for');
    Route::view('/x-if', 'methods.x-if');
    Route::view('/x-init', 'methods.x-init');
    Route::view('/x-effect', 'methods.x-effect');
    Route::view('/x-ref', 'methods.x-ref');
    Route::view('/x-cloak', 'methods.x-cloak');
    Route::view('/x-ignore', 'methods.x-ignore');
});

Route::prefix('games')->group(function () {
    Route::view('/', 'home');
    Route::view('/blackjack', 'games.blackjack');
    Route::view('/candyland', 'games.candyland');
    Route::view('/hangman', 'games.hangman');
    Route::view('/horse-racing', 'games.horse-racing');
    Route::view('/pokemon-quiz', 'games.pokemon-quiz');
    Route::view('/quiz', 'games.quiz');
    Route::view('/snake', 'games.snake');
    Route::view('/war', 'games.war');
    Route::view('/wheel-of-fortune', 'games.wheel-of-fortune');
});

Route::prefix('projects')->group(function () {
    Route::view('/', 'home');
    Route::view('/calculator', 'projects.calculator');
    Route::view('/dropdown', 'projects.dynamic-dropdown');
    Route::view('/expense-tracker', 'projects.expense-tracker');
    Route::view('/faq', 'projects.faq');
    Route::view('/memory', 'projects.memory');
    Route::view('/modal', 'projects.modal');
    Route::view('/pokemon-list', 'projects.pokemon-list');
    Route::view('/rating', 'projects.rating');
    Route::view('/todo-list', 'projects.todo-list');
    Route::view('/weather', 'projects.weather');
});
