<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\newAdmissionController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\batchesController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\feeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\todoController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\studymaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Auth::routes();
});

Route::group(['prefix' => 'admin', "middleware" => 'auth'], function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //!check notifications as soon as login and redirect then to the dashboard
    Route::get('/checkstatus', [notificationController::class, 'index']);
    //! profile route
    Route::get("/profile", [profileController::class, 'index'])->name('admin.profile');
    Route::post("updateprofile", [profileController::class, 'updateprofile']);
    Route::post("updatepassword", [profileController::class, 'updatepassword']);

    //! dashboard route
    Route::get("/dashboard", [dashboardController::class, 'index'])->name('admin.dashboard');

    //! todo task routes
    // Route::get('/', [todoController::class, "showtask"]);
    Route::post("/addtask", [todoController::class, "addtask"]);
    Route::post("/taskcomplete", [todoController::class, "taskcomplete"]);
    Route::post("/loaddata", [todoController::class, "loaddata"]);
    Route::post("/taskedit", [todoController::class, "taskedit"]);
    Route::post("/taskdelete", [todoController::class, "taskdelete"]);

    //!new admission route
    Route::get("/new-admission", [newAdmissionController::class, 'index'])->name('admin.new-admission');
    Route::post("course-details", [newAdmissionController::class, 'course_details']);
    Route::post("/new-admission", [newAdmissionController::class, 'admission_action']);
    //!for active and all students menu
    Route::get("/active-students", [studentsController::class, 'active_students'])->name('admin.active-students'); //all active students
    Route::get("/view-student/{id}", [studentsController::class, 'view_student'])->name('admin.view-student'); // view individual stud info
    Route::post('/edit-student', [studentsController::class, 'edit_student_action']);
    Route::get("/view-student", [studentsController::class, 'view_student_redirect']); //viewa student redirect
    Route::get("/all-students", [studentsController::class, 'all_students'])->name('admin.all-students'); // all students lifetime
    Route::post('upload-photo', [studentsController::class, 'upload_photo']); //to uploa photo
    //!batches
    Route::get("/batches", [batchesController::class, 'index'])->name('admin.batches');
    Route::get("/batches/{batchid}", [batchesController::class, 'view_batch'])->name('admin.batches.view-batch');
    Route::get("/add-batch", [batchesController::class, 'add_batch'])->name('admin.add-batch');
    Route::post("/add-batch", [batchesController::class, 'add_batch_action']);
    Route::get("/batches/edit/{batchid}", [batchesController::class, 'edit_batch'])->name('admin.batches.edit');
    Route::post("edit-batch", [batchesController::class, 'edit_batch_action']);
    //! courses
    Route::get('/courses', [coursesController::class, 'index'])->name('admin.courses');
    Route::get('/courses/{id}', [coursesController::class, 'view_course'])->name('admin.courses.view-course');
    Route::get('/course-version/{id}', [coursesController::class, 'view_course_version'])->name('admin.course-version');
    Route::post('/edit-course_action', [coursesController::class, 'edit_course_action']);
    Route::get('/add-course', [coursesController::class, 'add_course'])->name('admin.add-course');
    Route::post('/add-course', [coursesController::class, 'add_course_action']);
    //! fee status
    Route::get('/fee-status', [feeController::class, 'index'])->name('admin.fee-status');
    Route::post('/fee-action', [feeController::class, 'update_fee']);
    Route::get('/fee-details/{id}', [feeController::class, 'fee_details'])->name('admin.fee-details');
    Route::get('/fee-receipt/{id}', [feeController::class, 'fee_receipt'])->name('admin.fee-receipt');
    //! report
    Route::get('/report', [reportController::class, 'index2'])->name('admin.report');
    Route::get('reporttemplate', [reportController::class, 'template'])->name('admin.reporttemplate');
    //! notifications
    Route::get('/notifications', [notificationController::class, 'notifications'])->name('admin.notifications');
    //! upload study material
    Route::get('studymaterial', [studymaterialController::class, 'index'])->name('admin.studymaterial');
    Route::post('uploadstudymaterial', [studymaterialController::class, 'uploadstudymaterial']);
    Route::get('view-studymaterial/{id}', [studymaterialController::class, 'view_studymaterial'])->name('admin.view-studymaterial');
    Route::post('editstudymaterial', [studymaterialController::class, 'editstudymaterial']);
});
