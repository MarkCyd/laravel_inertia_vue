<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home'); //case sensitive about != to About
});

Route::inertia('/about','About',['user' => 'Mike']);
/* shorter version of the code below if you dont need to have a controller just display plain text*/
/* Route::get('/about', function () {
    return inertia('About',['user' => 'Mike']);
});*/
