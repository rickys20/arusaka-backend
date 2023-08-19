<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseOrderController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialOrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\QuizController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\UserController;
use App\Models\CourseOrder;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('test', function () {
    return new JsonResponse([
        'message' => 'Hello from staging'
    ], 200);
});
Route::get('', [CourseController::class, 'getActiveCourses']);
Route::post('webhook', [CourseOrderController::class, 'webhook']);

Route::prefix('auth')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [UserController::class, 'profile']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('', [CategoriesController::class, 'getAll']);
            Route::post('', [CategoriesController::class, 'store']);
            Route::get('{category}', [CategoriesController::class, 'getDetailCategory']);
            Route::put('{category}', [CategoriesController::class, 'editCategory']);
            Route::delete('{category}', [CategoriesController::class, 'deleteCategory']);
        });

        Route::prefix('partners')->group(function () {
            Route::get('', [PartnerController::class, 'getAll']);
            Route::post('', [PartnerController::class, 'store']);
            Route::get('{partner}', [PartnerController::class, 'getDetailPartner']);
            Route::put('{partner}', [PartnerController::class, 'editPartner']);
            Route::delete('{partner}', [PartnerController::class, 'deletePartner']);
        });

        Route::prefix('course-order')->group(function () {
            Route::get('', [CourseOrderController::class, 'getAllCoursetOrder']);
            Route::get('{course}', [CourseOrderController::class, 'getUserByCourse']);
            Route::delete('{course_order}', [CourseOrderController::class, 'deleteCourseOrder']);
        });

        Route::prefix('courses')->group(function () {
            Route::get('', [CourseController::class, 'getAll']);
            Route::post('', [CourseController::class, 'store']);
            Route::get('{course}', [CourseController::class, 'getDetailCourse']);
            Route::put('{course}', [CourseController::class, 'update']);
            Route::delete('{course}', [CourseController::class, 'destroy']);
        });

        Route::prefix('quiz')->group(function () {
            Route::get('', [QuizController::class, 'getAll']);
            Route::post('', [QuizController::class, 'store']);
            Route::get('{Quiz}', [QuizController::class, 'getDetailQuiz']);
            Route::put('{Quiz}', [QuizController::class, 'update']);
            Route::delete('{Quiz}', [QuizController::class, 'destroy']);
        });
    });

    Route::prefix('user')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('', [CategoriesController::class, 'getAll']);
            Route::get('{category}', [CategoriesController::class, 'getDetailCategory']);
        });

        Route::prefix('partners')->group(function () {
            Route::get('', [PartnerController::class, 'getAll']);
        });

        Route::prefix('courses')->group(function () {
            Route::get('', [CourseController::class, 'getActiveCoursesUser']);
            Route::get('mycourses', [CourseController::class, 'myCourse']);
            Route::post('{course}/register', [CourseOrderController::class, 'registerCourse']);
            Route::get('{course}/start', [CourseOrderController::class, 'startCourse']);
            Route::get('{course}/{material}', [MaterialOrderController::class, 'detail']);
        });
    });

    Route::prefix('materials')->group(function () {
        Route::get('', [MaterialController::class, 'getAll']);
        Route::post('', [MaterialController::class, 'store']);
        Route::get('{material}', [MaterialController::class, 'getDetailMaterial']);
        Route::put('{material}', [MaterialController::class, 'update']);
        Route::delete('{material}', [MaterialController::class, 'delete']);
    });

    Route::prefix('courses')->group(function () {
        Route::get('', [CourseController::class, 'getAll']);
        Route::post('', [CourseController::class, 'store']);
        Route::get('{course}', [CourseController::class, 'getDetailCourse']);
        Route::put('{course}', [CourseController::class, 'update']);
        Route::delete('{course}', [CourseController::class, 'destroy']);
    });

    Route::prefix('ratings')->group(function () {
        Route::post('{course_slug}', [RatingController::class, 'store']);
        Route::get('{course_slug}', [RatingController::class, 'getAll']);
        Route::delete('{course_slug}', [RatingController::class, 'delete']);
    });
});
