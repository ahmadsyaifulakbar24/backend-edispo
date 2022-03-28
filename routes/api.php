<?php

use App\Http\Controllers\API\ActivityLog\ActivityLogController;
use App\Http\Controllers\API\Agenda\CreateAgendaController;
use App\Http\Controllers\API\Agenda\DeleteAgendaController;
use App\Http\Controllers\API\Agenda\GetAgendaController;
use App\Http\Controllers\API\Agenda\UpdateAgendaController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\IncomingDisposition\CreateIncomingDispositionController;
use App\Http\Controllers\API\IncomingDisposition\DeleteIncomingDispositionController;
use App\Http\Controllers\API\IncomingDisposition\GetIncomingDispositionController;
use App\Http\Controllers\API\IncomingDisposition\UpdateIncomingDispositionController;
use App\Http\Controllers\API\Mail\CreateMailController;
use App\Http\Controllers\API\Mail\DeleteMailController;
use App\Http\Controllers\API\Mail\GetMailController;
use App\Http\Controllers\API\Mail\UpdateMailController;
use App\Http\Controllers\API\MailDisposition\CreateMailDispositionController;
use App\Http\Controllers\API\MailDisposition\GetMailDispositionController;
use App\Http\Controllers\API\MailDisposition\UpdateMailDispositionController;
use App\Http\Controllers\API\Param\ParamController;
use App\Http\Controllers\API\Report\ReportController;
use App\Http\Controllers\API\User\AllUserController;
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
        Route::delete('/logout', LogoutController::class);
        Route::get('/user', UserController::class);
    });

    Route::prefix('param')->group(function () {
        Route::get('mail_nature', [ParamController::class, 'get_mail_nature']);
        Route::get('instruction', [ParamController::class, 'get_instruction']);
        Route::get('mail_security', [ParamController::class, 'get_mail_security']);
        Route::get('mail_type', [ParamController::class, 'get_mail_type']);
    });

    Route::prefix('mail')->group(function () {
        Route::get('/', [GetMailController::class, 'get']);
        Route::get('/{mail:id}', [GetMailController::class, 'show']);
        Route::post('/', CreateMailController::class);
        Route::put('/{mail:id}', [UpdateMailController::class, 'update']);
        Route::delete('/{mail:id}', DeleteMailController::class);
    });

    Route::prefix('incoming_disposition')->group(function() {
        Route::post('', CreateIncomingDispositionController::class);
        Route::get('', [GetIncomingDispositionController::class, 'get']);
        Route::get('show/{incoming_disposition:id}', [GetIncomingDispositionController::class, 'show']);
        Route::put('/{incoming_disposition:id}', UpdateIncomingDispositionController::class);
        Route::delete('/{incoming_disposition:id}', DeleteIncomingDispositionController::class);
    });
    
    Route::prefix('mail_disposition')->group(function () {
        Route::post('/', CreateMailDispositionController::class);
        Route::get('/out_disposition', [GetMailDispositionController::class, 'out_disposition']);
        Route::get('/show/{mail_disposition:id}', [GetMailDispositionController::class, 'show']);
        Route::patch('/read', [UpdateMailDispositionController::class, 'read']);
    });

    Route::prefix('agenda')->group(function() {
        Route::get('/', [GetAgendaController::class, 'get']);
        Route::get('/{agenda:id}', [GetAgendaController::class, 'show']);
        Route::post('/', CreateAgendaController::class);
        Route::put('/{agenda:id}', UpdateAgendaController::class);
        Route::delete('/{agenda:id}', DeleteAgendaController::class);
    });
    
    Route::prefix('user')->group(function() {
        Route::get('/disposition', [AllUserController::class, 'disposition']);
        Route::post('/reset_password', [AllUserController::class, 'reset_password']);
    });

    Route::prefix('activity_log')->group(function() {
        Route::get('/', [ActivityLogController::class, 'get']);
        Route::get('/show/{activity_log:id}', [ActivityLogController::class, 'show']);
    });

    Route::prefix('report')->group(function() {
        Route::get('total_data', [ReportController::class, 'get_total_data']);
    });
});
