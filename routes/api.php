<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\SkillController;

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

Route::get('candidate', [CandidateController::class, 'index']);
Route::get('candidate/{candidateId}', [CandidateController::class, 'getOne']);
Route::Post('candidate', [CandidateController::class, 'create']);
Route::get('skill', [SkillController::class, 'index']);
