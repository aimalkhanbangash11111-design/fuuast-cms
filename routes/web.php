<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;     

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () { 
        return view('admin.dashboard'); 
    })->name('admin.dashboard');
    
    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin/courses', [CourseController::class, 'store'])->name('admin.courses.store');
});

// TEACHER ROUTES
Route::middleware(['auth', 'role:teacher'])->group(function () {
   Route::get('/teacher/dashboard', function () {
    $courses = \App\Models\Course::where('teacher_id', auth()->id())->get();
    return view('teacher.dashboard', compact('courses'));
})->middleware(['auth', 'role:teacher'])->name('teacher.dashboard');

    Route::get('/teacher/courses/{course}/attendance', [App\Http\Controllers\AttendanceController::class, 'create'])->name('teacher.attendance.create');
    Route::post('/teacher/courses/{course}/attendance', [App\Http\Controllers\AttendanceController::class, 'store'])->name('teacher.attendance.store');
});

// STUDENT ROUTES
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () { 
        return view('student.dashboard'); 
    })->name('student.dashboard');

     Route::get('/student/attendance', [App\Http\Controllers\AttendanceController::class, 'myAttendance'])->name('student.attendance');
});
Route::get('/profile', function(){ return redirect('/dashboard'); })->name('profile.edit');
require __DIR__.'/auth.php';
Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

// FCMS - Complaint Management Routes - Week 6
Route::middleware(['auth'])->group(function () {
    Route::get('/complaints/create', [App\Http\Controllers\ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('/complaints', [App\Http\Controllers\ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('/my-complaints', [App\Http\Controllers\ComplaintController::class, 'myComplaints'])->name('complaints.my');
    Route::get('/complaints/search', [App\Http\Controllers\ComplaintController::class, 'search'])->name('complaints.search');
});