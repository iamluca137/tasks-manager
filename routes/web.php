<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Calendar\Calendar;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/forgot-password', Login::class)->name('password.request');
Route::get('/reset-password', Login::class)->name('password.reset');
Route::get('/signout', [Login::class, 'signout'])->name('signout');

// Calendar
Route::get('/', Calendar::class)->name('calendar')->middleware('auth');
