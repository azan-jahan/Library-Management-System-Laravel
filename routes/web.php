<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IssuedBookController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', [AuthController::class, 'showLanding'])->name('landing');

// Admin Routes
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::get('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Book Routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/manage', [BookController::class, 'manage'])->name('books.manage');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// Issued Book Routes
Route::get('/issued/issue', [IssuedBookController::class, 'showIssue'])->name('issued.issue');
Route::post('/issued/issue', [IssuedBookController::class, 'issue'])->name('issued.issue.post');
Route::get('/issued/return', [IssuedBookController::class, 'showReturn'])->name('issued.return');
Route::get('/issued/return/{id}', [IssuedBookController::class, 'returnBook'])->name('issued.return.book');

// Student Routes
Route::get('/student/portal', [StudentController::class, 'showPortal'])->name('student.portal');
Route::get('/student/register', [StudentController::class, 'showRegister'])->name('student.register');
Route::post('/student/register', [StudentController::class, 'register'])->name('student.register.post');
Route::get('/student/login', [StudentController::class, 'showLogin'])->name('student.login');
Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.post');
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::get('/student/borrow/{id}', [StudentController::class, 'borrow'])->name('student.borrow');
Route::get('/student/logout', [StudentController::class, 'logout'])->name('student.logout');
