<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubmissionController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store'); // Store a new role
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    // Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create'); // Show form to create a new role (optional for API)
    Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show'); // Show a specific role
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update'); // Update a specific role
    // Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit'); // Show form to edit a role (optional for API)
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy'); // Delete a specific role

});

Route::middleware([StudentMiddleware::class])->group(function () {
    Route::get('class-subjects', [ClassSubjectController::class, 'index'])->name('class-subjects.index');

    Route::get('submissions', [SubmissionController::class, 'index'])->name('submissions.index');
    Route::post('submissions', [SubmissionController::class, 'store'])->name('submissions.store');
    Route::get('submissions/{submission}', [SubmissionController::class, 'show'])->name('submissions.show');

    Route::get('homework', [HomeworkController::class, 'index'])->name('homework.index');
    Route::post('homework', [HomeworkController::class, 'store'])->name('homework.store');
    Route::put('homework/{homework}', [HomeworkController::class, 'update'])->name('homework.update');
    Route::delete('homework/{homework}', [HomeworkController::class, 'destroy'])->name('homework.destroy');

    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::middleware([TeacherMiddleware::class])->group(function () {
    Route::post('class-subjects', [ClassSubjectController::class, 'store'])->name('class-subjects.store');
    Route::put('class-subjects/{classSubject}', [ClassSubjectController::class, 'update'])->name('class-subjects.update');
    Route::delete('class-subjects/{classSubject}', [ClassSubjectController::class, 'destroy'])->name('class-subjects.destroy');

    Route::get('homework', [HomeworkController::class, 'index'])->name('homework.index');
    Route::post('homework', [HomeworkController::class, 'store'])->name('homework.store');
    Route::put('homework/{homework}', [HomeworkController::class, 'update'])->name('homework.update');
    Route::delete('homework/{homework}', [HomeworkController::class, 'destroy'])->name('homework.destroy');

    // Material routes for teachers
    Route::get('materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::post('materials', [MaterialController::class, 'store'])->name('materials.store');
    Route::put('materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');

    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
   
});

require __DIR__ . '/auth.php';
