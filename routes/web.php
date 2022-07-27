<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $article = ['title' => 'I am title' , 'body' => 'I am Article Body'];
    \App\Models\Article::create($article)
        ->addMedia(storage_path('demo/pic1.jpg'))
        ->toMediaCollection();
});
