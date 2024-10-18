<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.auth.login');
});

Route::get('home', function () {
    return view('page.dashbord');
});


//routing dipindahkan ke fortify yang ada di providers
// Route::get('/login', function () {
//     return view('page.auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('page.auth.register');
// })->name('register');


