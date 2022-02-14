<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\Mail\CreateMailController;
use App\Http\Controllers\API\Mail\DeleteMailController;
use App\Http\Controllers\API\Mail\GetMailController;
use App\Http\Controllers\API\Mail\UpdateMailController;
use App\Http\Controllers\API\MailDisposition\CreateMailDispositionController;
use App\Http\Controllers\API\MailDisposition\GetMailDispositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/login', LoginController::class);

Route::middleware(['auth:api'])->group(function() {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', LogoutController::class);
        Route::get('/user', UserController::class);
    });

    Route::prefix('mail')->group(function () {
        Route::get('/', [GetMailController::class, 'get']);
        Route::get('/{mail:id}', [GetMailController::class, 'show']);
        Route::post('/', CreateMailController::class);
        Route::put('/{mail:id}', [UpdateMailController::class, 'update']);
        Route::delete('/{mail:id}', DeleteMailController::class);
    });

    Route::prefix('mail_disposition')->group(function () {
        Route::post('/', CreateMailDispositionController::class);
        Route::get('/incoming_disposition', [GetMailDispositionController::class, 'incoming_disposition']);
        Route::get('/out_disposition', [GetMailDispositionController::class, 'out_disposition']);
    });
});
