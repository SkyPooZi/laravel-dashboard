<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello world !";
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Moch Siril Wafa Zidane Feliano",
        "kelas" => "11 PPLG 2",
        "foto" => "images/foto.jpg",
    ]);
});

Route::group(["prefix" => "/student"], function(){
    Route::get('/all', [StudentsController::class,'index'])->name('student.all'); //view
    Route::get('/detail/{student}', [StudentsController::class,'show']); //detail
    Route::get('/create', [StudentsController::class,'create']); //create data
    Route::post('/add', [StudentsController::class,'store']); // add data
    Route::delete('/delete/{student}', [StudentsController::class,'destory']); // delete data
    Route::get('/edit/{student}', [StudentsController::class,'edit']); // provide form edit
    Route::post('/update/{student}', [StudentsController::class,'update']); // edit data
});

Route::group(["prefix" => "/kelas"], function(){
    Route::get('/all', [KelasController::class,'index'])->name('kelas.all'); //view
    Route::get('/detail/{kelas}', [KelasController::class,'show']); //detail
    Route::get('/create', [KelasController::class,'create']); //create data
    Route::post('/add', [KelasController::class,'store']); // add data
    Route::delete('/delete/{kelas}', [KelasController::class,'destory']); // delete data
    Route::get('/edit/{kelas}', [KelasController::class,'edit']); // provide form edit
    Route::post('/update/{kelas}', [KelasController::class,'update']); // edit data
});

Route::group(["prefix" => "/login"], function(){
    Route::get('/index', [AuthController::class,'login'])->name('login.index'); //view
    Route::post('/add', [AuthController::class,'loginStore']); // add data
});

Route::group(["prefix" => "/register"], function(){
    Route::get('/index', [AuthController::class,'register'])->name('register.index'); //view
    Route::post('/add', [AuthController::class,'registerStore']); // add data
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
