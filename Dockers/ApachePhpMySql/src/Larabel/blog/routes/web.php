<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('home');

// Ejercicio 3
Route::get('/posts', function () {
    return view('posts.listado');
})->name('posts.listado');

Route::get('/fecha', function () {
    return Carbon::now();
});

// Ejercicio 4
Route::get('/posts/{id?}', function ($id = 1) {
    return view('posts.ficha', ['id' => $id]);
})->name('posts.listado');

Route::get('/fecha', function () {
    return Carbon::now();
})->name('post.fecha');