<?php

use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('{url}', HomePage::class)->name('custom-page')->where('url', '.*');

