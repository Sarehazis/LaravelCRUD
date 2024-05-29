<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\Project1Controller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Router untuk ke halaman homepage

Route::get('/home', function () { return 'Home Page'; });

// Router untuk ke halaman about page
Route::get('/about', function () { return 'About Page'; });

// Router untuk ke halaman contact
Route::get('/contact', function () { return 'Contact Page'; });

// Router untuk ke halaman projects
Route::get('/projects', function () { return 'List Projects'; });

// Integrasi ke halaman home
Route::get('/', function () { return view('home'); });

// Integrasi halaman about
Route::get('/about', function () { return view('about'); });

// Integrasi halaman contact
Route::get('/contact', function () { return view('contact'); });

// Integrasi halaman project
Route::get('/projects', function () { return view('projects'); });


// Menghubungkan dengan routes
Route::get('/projectsatu', [Project1Controller::class, 'index']);
Route::get('/satu', [Project1Controller::class, 'nama']);
Route::get('/dua', [Project1Controller::class, 'jurusan']);

// Admin Routes

// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// Route::get('/admin/project-types', [ProjectTypeController::class, 'index'])->name('project-types.index');

// Login
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('login', [LoginController::class, 'proseslogin'])->name('login.proses');

// Admin Group Routes
Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'auth'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/project-types', [ProjectTypeController::class, 'index'])->name('project-types.index');
    // Create
    Route::get('/project-types/create', [ProjectTypeController::class, 'create'])->name('project-types.create');
    Route::post('/project-types/store', [ProjectTypeController::class, 'store'])->name('project-types.store');
    // Delete
    Route::delete('/project-types/{id}',[ProjectTypeController::class, 'destroy'])->name('project-types.destroy');
    // Edit
    Route::get('/project-types/{id}/edit',[ProjectTypeController::class, 'edit'])->name('project-types.edit');
    Route::patch('/project-types/{id}',[ProjectTypeController::class, 'update'])->name('project-types.update');
    // Controller Project
    Route::get('/projects', [ProjectController::class,'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class,'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class,'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class,'edit'])->name('projects.edit');
    Route::patch('/projects/{id}', [ProjectController::class,'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class,'destroy'])->name('projects.destroy');
});
