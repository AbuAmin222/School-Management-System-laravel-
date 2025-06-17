<?php

use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Lectures\LectureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Stages\stageController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Test', function () {
    return view('test');
});

// URL: LearnSchool/Dashboard/
//      (
//          Grades =>
//              [/, /Add, /Get-Data, /Get-Active-Grades, /Get-Active-Sections, /Get-Active-Stages, /Add-Section, /Change-Master]
//      )
//      (
//          Sections =>
//              [/, /Get-Data, /Add, /Change-Status]
//      )
//      (
//          Teachers =>
//              [/, /Get-Data, /Add, /Update, /Delete, /Active]
//      )
//      (
//          Students =>
//              [/, /Add, /Get-Data, /Update, /Delete]
//      )
//      (
//          Subjects =>
//              [/, /Add, /Get-Data, /Update, /Delete]
//      )
//      (
//          Lectures =>
//              [/, /Add, /Get-Data, /Update, /Delete]
//      )

// NAME: school.dashboard.
//      (
//          grade.
//              [index, add, getdata, getactive, getactive.section, getactive.stage, addsection, changemaster]
//      )
//      (
//          section.
//              [index, getdata, add, changestatus]
//      )
//      (
//          teacher.
//              [index, getdata, add, update, delete, active]
//      )
//      (
//          student.
//              [index, add, getdata, update, delete]
//      )
//      (
//          subject.
//              [index, add, getdata, update, delete]
//      )
//      (
//          lecture.
//              [index, add, getdata, update, delete]
//      )


Route::prefix('/LearnSchool')->name('school.')->group(function () {
    Route::prefix('/Dashboard')->name('dashboard.')->group(function () {

        Route::prefix('/Grades')->name('grade.')->controller(GradeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/Add', 'add')->name('add');
            Route::get('/Get-Data', 'getdata')->name('getdata');
            Route::get('/Get-Active-Grades', 'getactive')->name('getactive');
            Route::get('/Get-Active-Sections', 'getactivesection')->name('getactive.section');
            Route::get('/Get-Active-Stages', 'getactivestage')->name('getactive.stage');
            Route::post('/Add-Section', 'addsection')->name('addsection');
            Route::post('/Change-Master', 'changemaster')->name('changemaster');
        });

        Route::prefix('/Sections')->name('section.')->controller(SectionController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/Get-Data', 'getdata')->name('getdata');
            Route::post('/Add', 'add')->name('add');
            Route::post('/Change-Status', 'changestatus')->name('changestatus');
        });

        Route::prefix('/Teachers')->name('teacher.')->controller(TeacherController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/Get-Data', 'getdata')->name('getdata');
            Route::post('/Add', 'add')->name('add');
            Route::post('/Update', 'update')->name('update');
            Route::post('/Delete', 'delete')->name('delete');
            Route::post('/Active', 'active')->name('active');
        });

        Route::prefix('/Subjects')->name('subject.')->controller(SubjectController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/Get-Data', 'getdata')->name('getdata');
            Route::post('/Add', 'add')->name('add');
            Route::post('/Update', 'update')->name('update');
            Route::post('/Delete', 'delete')->name('delete');
        });

        Route::prefix('/Students')->name('student.')->controller(StudentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/Get-Data', 'getdata')->name('getdata');
            Route::post('/Add', 'add')->name('add');
            Route::post('/Update', 'update')->name('update');
            Route::post('/Delete', 'delete')->name('delete');
        });

        Route::prefix('/Lectures')->name('lecture.')->controller(LectureController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/Get-Data', 'getdata')->name('getdata');
            Route::post('/Add', 'add')->name('add');
            Route::post('/Update', 'update')->name('update');
            Route::post('/Delete', 'delete')->name('delete');
        });
    });
});














Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
