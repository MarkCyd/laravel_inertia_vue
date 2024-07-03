<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//use Inertia\Inertia;
                                                    //inside inertia('/', 'Home',['users'=> User::all()] ['names'] we can specifiy which to show if we dont
                                                    //use user model that dont have hide protect password and token
//Route::get('/', 'Home',['users'=> User::paginate(5)])->name('home');                                  //reason ziggy plugin is needed ;
Route::get('/', function (Request $request) {
    return inertia('Home', [
        'users' => User::when($request->search, function ($query) use ($request) {
            $query
            ->where('name', 'like', '%' . $request->search . '%')
            ->where('email', 'like', '%' . $request->search . '%');
        })->paginate(5)->withQueryString(),

        'searchTerm' =>$request->search,
        'can' => [
            'delete_user' => Auth::user()  ? Auth::user()->can('delete',User::class) : null
        ]
    ]);
})->name('home');

Route::middleware("auth")->group(function(){
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::post('/logout', [AuthController::class,'logout'])->name('logout');                                                                       
});

Route::middleware("guest")->group(function(){
                                                                                               // sleep(2); this can be run on app.js for cleaner code but i feel like global setting delay
        Route::inertia('/register', 'Auth/Register')->name('register');                //case sensitive about != to About
                                                                                                //Auth is the folder/Register is the vuefile
        Route::post('/register', [AuthController::class,'Register']);                       //Route::inertia('/about','About',['user' => 'Mike'])->name('about');
                            /* shorter version of the code below if you dont need to have a controller just display plain text*/
        Route::inertia('/login', 'Auth/Login')->name('login');             /* Route::get('/about', function () {  return inertia('About',['user' => 'Mike']); });*/
        Route::post('/login', [AuthController::class,'login']);                                                                       
                                         
});
 
