<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class,'index']); 
Route::get('/gallery/{id}', [MainController::class,'gallery']); 

Route::get('/about', function () {
    return view('about');
});

Route::view('/register','register');

Route::get('/contact', function () {
    $contacts = [
        ['title'=>'Address ', 'value'=> ': 38 Bolshaya Semyonovskaya Street, Moscow, 107023, Russia'],
        ['title'=>'Telephone ', 'value'=>': +7999999999'],
        ['title'=>'Email ', 'value'=>': example@gmail.com'],
    ];

    return view('contact',['contacts' => $contacts]);
});
