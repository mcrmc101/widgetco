<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WidgetControl;

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

Route::get('testC', [ WidgetControl::class, 'testC' ]);
Route::get('allWidgets', [ WidgetControl::class, 'allWidgets' ]);
Route::post('addWidgets', [ WidgetControl::class, 'addWidgets' ]);
Route::post('deleteWidgets', [ WidgetControl::class, 'deleteWidgets' ]);
Route::post('calcWidgets', [ WidgetControl::class, 'calcWidgets' ]);
