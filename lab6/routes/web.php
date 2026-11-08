<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;


Route::get('/', [MainController::class,'index']); 
Route::get('/gallery/{id}', [MainController::class,'gallery']); 


Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    $contacts = [
        ['title'=>'Address ', 'value'=> ': 38 Bolshaya Semyonovskaya Street, Moscow, 107023, Russia'],
        ['title'=>'Telephone ', 'value'=>': +7999999999'],
        ['title'=>'Email ', 'value'=>': example@gmail.com'],
    ];
    return view('contact',['contacts' => $contacts]);
});


Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'registration']);
Route::get('/login', [AuthController::class ,'loginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::resource('articles', ArticleController::class)->except(['index','show']);
});



Route::resource('articles', ArticleController::class)->only(['index','show']);