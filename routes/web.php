<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/invitation/{token}', function (){
    dd("Hello Mfs");
})->name('invitations.accept');
