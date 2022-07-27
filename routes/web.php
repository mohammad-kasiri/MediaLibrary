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
    \App\Models\Article::query()->latest()->first()->getFirstMedia()->getPath();
    \App\Models\Article::query()->latest()->first()->getFirstMedia()->getUrl();
    \App\Models\Article::query()->latest()->first()->getFirstMedia();
    \App\Models\Article::query()->latest()->first()->getMedia();

    //Upload Single Media
    $article = ['title' => 'I am title' , 'body' => 'I am Article Body'];
    \App\Models\Article::create($article)
        ->addMedia(storage_path('demo/pic1.jpg'))
        ->toMediaCollection();


    //Upload Multiple Media
    $article= \App\Models\Article::create($article);

    $article->addMedia(storage_path('demo/pic1.jpg'))
            ->toMediaCollection();

    $article->addMedia(storage_path('demo/pic1.jpg'))
        ->toMediaCollection();


    //Upload Media From Request
    $article= \App\Models\Article::create($article);

    $article->addMediaFromRequest('image')  // 👉  name of input in request body
            ->toMediaCollection();

    //If You Want To Not Move, But Copy, The Original File You Can Call PreservingOriginal:
    \App\Models\Article::create($article)
        ->addMedia(storage_path('demo/pic1.jpg'))
        ->preservingOriginal()
        ->toMediaCollection();

    //Override Specific Columns
    \App\Models\Article::create($article)
        ->addMedia(storage_path('demo/pic1.jpg'))
        ->usingName()
        ->usingFileName()
        ->withCustomProperties([
            'location' => 'Ireland',
            'subject'  => 'A Nice Car'
        ])
        ->preservingOriginal()
        ->toMediaCollection();
});
