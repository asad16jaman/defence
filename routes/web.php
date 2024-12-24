<?php

use App\Http\Controllers\admin\AdminUsersController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\LessonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HandleLikeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\profile\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\DiscussionController;

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



Route::middleware('guest')->group(function(){
   
   
    Route::get("/register",[AuthController::class,'register'])->name('register');
    Route::post("/register",[AuthController::class,'store'])->name('register.store');
    Route::get("/login",[AuthController::class,'login'])->name('login');
    Route::post("/login",[AuthController::class,'authenticate'])->name('session');
 

     // passwrrd reset link
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
    Route::post('/forgot-password',[AuthController::class,'sendEmailForResetPassword'] )->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class,'resetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class,'resetPassword'])->name('password.update');

});





Route::middleware('auth')->group(function(){

  Route::get('/verifyEmail',[AuthController::class,'sndMailForEmailVarification'])->name('sendEmailForVarify');
  Route::get('/email/verify', function () {
    return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class,'emailVarification'])->middleware(['signed'])->name('verification.verify');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');





    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});










// front routing section

Route::get('/dusscusstion',[DiscussionController::class,'index'])->name('discus.index');
Route::get('/threadlist/{id}',[DiscussionController::class,'threadlist'])->name('discus.threadlist')->whereNumber('id');
Route::post('/questionPost/{id}',[DiscussionController::class,'storequestion'])->name('discus.storequestion')->whereNumber('id');
Route::post('/questionEdit/{id}',[DiscussionController::class,'updateQuestion'])->name('discus.updateQuestion')->whereNumber('id');
Route::post('/deleteQuestion/{catId}/{threadId}',[DiscussionController::class,'threadDelete'])->name('threadDelete');


Route::get('/comment/{id}',[CommentController::class,'index'])->name('discus.comment');
Route::post('/comment/{id}',[CommentController::class,'store'])->name('comment.store');
Route::post('/comment/{id}/update',[CommentController::class,'update'])->name('comment.update');
Route::post('/comment/{id}/delete',[CommentController::class,'delete'])->name('comment.delete');



Route::post('/like/{id}',[HandleLikeController::class,'store'])->name('like.add');



Route::get('/',[HomePageController::class,'index'])->name('home');

Route::get('/courses',[HomePageController::class,'allCourse'])->name('front.courses');
Route::get('/course/{id}',[HomePageController::class,'course'])->name('front.course');
Route::get('/checkout/{id}',[HomePageController::class,'checkout'])->name('front.checkout');




//profile
Route::prefix('/profile')->middleware(['auth'])->group(function(){

    Route::get('/',[ProfileController::class,'index'])->name('profile');
    Route::post('/',[ProfileController::class,'update_profile'])->name('profile');

    Route::get('/edit_picture',[ProfileController::class,'editPicture'])->name('profile.edit.picture');
    Route::post('/edit_picture',[ProfileController::class,'updateProfilePicture'])->name('profile.edit.picture');

    Route::get('/feedack/{id?}',[ProfileController::class,'feedback'])->name('profile.feedback');
    Route::post('/feedack/{id?}',[ProfileController::class,'storeFeedback'])->name('profile.feedback');
    Route::get('/feedack/{id}/delete',[ProfileController::class,'deleteFeedback'])->name('profile.feedback.delete');

    Route::get('/{id}/mycouse/{lesson?}',[ProfileController::class,'course'])->name('profile.course');

    Route::get('/password',[ProfileController::class,'changePassword'])->name('profile.password.edit');




    
});




Route::prefix('/dashboard')->middleware(['auth'])->group(function(){


    Route::get('/',[AdminController::class,'index'])->name('admin.pannel');

    //courses
    Route::get('/courses',[CourseController::class,'index'])->name('admin.courses');
    Route::get('/courses/create',[CourseController::class,'create'])->name('admin.course.create');
    Route::post('/courses/create',[CourseController::class,'store'])->name('admin.course.create');
    Route::get('/courses/{id}/edit/',[CourseController::class,'edit'])->name('admin.course.edit');
    Route::post('/courses/{id}/edit',[CourseController::class,'update'])->name('admin.course.edit');


    //lesson
    Route::get('/lessons/{course?}',[LessonController::class,'index'])->name('admin.lesson');
    Route::get('/lesson/{course}/create',[LessonController::class,'create'])->name('admin.lesson.create');
    Route::post('/lesson/{course}/create',[LessonController::class,'store'])->name('admin.lesson.create');



    //users
    Route::get('/users',[AdminUsersController::class,'index'])->name('admin.users');



    //feedbacks
    Route::get('/feedbacks',[AdminUsersController::class,'feedback'])->name('admin.feedback');


    //dashboard    
    Route::get('/catagory', [CatagoryController::class,'index'])->name('catagory_index');
    Route::get('/catagory/create', [CatagoryController::class,'create'])->name('catagory_create');
    Route::post('/catagory/store', [CatagoryController::class,'store'])->name('catagory_store');
    Route::get('/catagory/{id}/edit', [CatagoryController::class,'edit'])->name('catagory_edit');
    Route::post('/catagory/{id}/edit', [CatagoryController::class,'update'])->name('catagory_update');
    Route::get('/catagory/{id}/delete', [CatagoryController::class,'delete'])->name('catagory_delete');



});





