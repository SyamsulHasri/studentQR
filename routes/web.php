<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', [StudentController::class, 'index'])->name('landing.page');
//for uploading to database
Route::post('/upload-form/fileupload',[StudentController::class,'store'])->name('uploadstudent');
// download excel template
Route::get('get/template', [StudentController::class, 'downloadFile'])->name('downloadtemplate');
