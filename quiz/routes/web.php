<?php

use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\CookieController;

Route::get('/', function () {
    return view('home');
});

Route::get('/q1', [ToDoController::class, 'index'])->name('q1');
Route::post('/add-task', [ToDoController::class, 'create'])->name('add-task');
Route::get('/update/{id}', [ToDoController::class, 'updatePage'])->name('updatePage');
Route::delete('/delete/{id}', [ToDoController::class, 'deleteTask'])->name('delete-task');
Route::put('/update/{id}', [ToDoController::class, 'update'])->name('update-task'); 
Route::get('/search', [ToDoController::class, 'search'])->name('search');


Route::get('/q2', [UserAuth::class, 'index'])->name('q2');;

Route::get('/q3', function () {
    $cookies = new CookieController();
    $visited = $cookies->getCookies();
    return view('question3', compact('visited'));
});

Route::post('/login', [UserAuth::class, 'login'])->name('login');
Route::post('/register', [UserAuth::class, 'register'])->name('register');
Route::get('/logout', [UserAuth::class, 'logout'])->name('logout');
Route::get('/set-cookies', [CookieController::class, 'setCookies'])->name('login');
Route::get('/get-cookies', [CookieController::class, 'getCookies'])->name('login');


