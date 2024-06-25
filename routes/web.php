<?php

use Illuminate\Support\Facades\Route;
//use Inertia\Inertia;

Route::inertia('/', 'Home')->name('home'); //reason ziggy plugin is needed ;
                                                                // sleep(2); this can be run on app.js for cleaner code but i feel like global setting delay
Route::inertia('/register', 'Auth/Register')->name('register');   //case sensitive about != to About
                                      //Auth is the folder/Register is the vuefile
                                                               //Route::inertia('/about','About',['user' => 'Mike'])->name('about');
                                                                /* shorter version of the code below if you dont need to have a controller just display plain text*/
                                                                /* Route::get('/about', function () {
                                                                    return inertia('About',['user' => 'Mike']);
                                                                });*/
