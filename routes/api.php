<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseOrderController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialOrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizItemController;
use App\Http\Controllers\QuizOrderController;
use App\Http\Controllers\LivePracticeController;
use App\Http\Controllers\LivePracticeOrderController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\UserController;
use App\Models\CourseOrder;
use App\Models\LivePracticeOrder;

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
        'message' => 'Hello from staging : ok!'
    ], 200);
});
Route::get('', [CourseController::class, 'getActiveCourses']);
Route::post('webhook', [CourseOrderController::class, 'webhook']);
Route::get('partners', [PartnerController::class, 'getAll']);
Route::post('forgot-password', [ResetPasswordController::class, 'forgotPassword']);
Route::post('password-check',  [ResetPasswordController::class, 'codecheck']);
Route::post('password-reset', [ResetPasswordController::class, 'valid']);

Route::prefix('auth')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
});

Route::get('email/verify/{id}/{hash}', [UserController::class, 'verifyEmail'])->name('verification.verify');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [UserController::class, 'profile']);
    Route::put('profile', [UserController::class, 'update']);
    Route::put('profile/password', [UserController::class, 'updatePassword']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::prefix('admin')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('', [CategoriesController::class, 'getAll']);
            Route::post('', [CategoriesController::class, 'store']);
            Route::get('{category}', [CategoriesController::class, 'getDetailCategory']);
            Route::put('{category}', [CategoriesController::class, 'editCategory']);
            Route::delete('{category}', [CategoriesController::class, 'deleteCategory']);
        });

        Route::prefix('partners')->group(function () {
            // Route::get('', [PartnerController::class, 'getAll']);
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
            Route::get('', [QuizController::class, 'index']);
            Route::post('{course}', [QuizController::class, 'store']);
            Route::post('{course}/{quiz}', [QuizController::class, 'edit']);
            Route::get('{Quiz}', [QuizController::class, 'getDetailQuiz']);
            Route::put('{Quiz}', [QuizController::class, 'update']);
            Route::delete('{course}/{Quiz}', [QuizController::class, 'destroy']);
        });

        Route::prefix('quiz_item')->group(function () {
            Route::get('', [QuizItemController::class, 'index']);
            Route::post('{course}/{quiz}', [QuizItemController::class, 'store']);
            Route::get('{course}/{quiz}', [QuizItemController::class, 'show']);
            Route::post('{course}/{quiz}/{no_item}', [QuizItemController::class, 'edit']);
            Route::delete('{course}/{quiz}/{no_item}', [QuizItemController::class, 'destroy']);
        });

        Route::prefix('live_practice')->group(function () {
            Route::get('', [LivePracticeController::class, 'index']);
            Route::post('{course}', [LivePracticeController::class, 'store']);
            // Route::get('{course}/{quiz}', [LivePracticeController::class, 'show']);
            Route::post('{course}/{live}', [LivePracticeController::class, 'edit']);
            Route::delete('{course}/{live}', [LivePracticeController::class, 'destroy']);
        });

        Route::prefix('goods')->group(function () {
            Route::post('', [GoodController::class, 'store']);
            Route::put('{good}', [GoodController::class, 'update']);
            Route::delete('{good}', [GoodController::class, 'destroy']);
        });
    });

    Route::prefix('user')->group(function () {
        Route::prefix('goods')->group(function () {
            Route::get('', [GoodController::class, 'getAll']);
            Route::get('/id/{good}', [GoodController::class, 'getOneBasedId']);
            Route::get('/{good}', [GoodController::class, 'getOneBasedSlug']);
        });

        Route::prefix('categories')->group(function () {
            Route::get('', [CategoriesController::class, 'getAll']);
            Route::get('{category}', [CategoriesController::class, 'getDetailCategory']);
        });

        // Route::prefix('partners')->group(function () {
        //     Route::get('', [PartnerController::class, 'getAll']);
        // });

        Route::prefix('courses')->group(function () {
            Route::get('', [CourseController::class, 'getActiveCoursesUser']);
            Route::get('mycourses', [CourseController::class, 'myCourse']);
            Route::post('{course}/register', [CourseOrderController::class, 'registerCourse']);
            Route::get('{course}/start', [CourseOrderController::class, 'startCourse']);
            Route::get('{course}/{material}', [MaterialOrderController::class, 'detail']);
        });

        Route::prefix('quiz')->group(function () {
            Route::get('{quiz}/list', [QuizOrderController::class, 'listQuiz']);
            Route::get('{quiz}/start', [QuizOrderController::class, 'getQuiz']);
            Route::get('{quiz}/finish', [QuizOrderController::class, 'finishQuiz']);
            Route::get('{quiz}/{number}', [QuizOrderController::class, 'getQuizPerNum']);
            Route::post('{quiz}/{number}', [QuizOrderController::class, 'submitAnswer']);
        });

        Route::prefix('report')->group(function () {
            Route::get('{quiz}', [QuizOrderController::class, 'getQuiz']);
        });

        Route::prefix('live_practice')->group(function () {
            Route::get('{course}', [LivePracticeOrderController::class, 'index']);
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
