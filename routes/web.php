<?php

use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/invitation/{token}', [InvitationController::class, 'show'])
    ->middleware('web')
    ->name('invitations.show');

Route::post('/invitation/{token}/accept', [InvitationController::class, 'accept'])
    ->middleware(['web', 'auth'])
    ->name('invitations.accept');
