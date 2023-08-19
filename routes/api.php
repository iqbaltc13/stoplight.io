<?php

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
Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1', 'middleware' => ['save.deviceinfo']], function() {
        Route::group(['prefix' => 'autentikasi', 'namespace' => 'Autentikasi'], function() {
            Route::post('signin', 'AutentikasiController@signin');
            Route::post('signin-firebase', 'AutentikasiController@signinFirebase');
            Route::post('signin-bypass', 'AutentikasiController@signinBypass');
            Route::post('signout', 'AutentikasiController@signout')->middleware('auth:api');
            Route::post('signup', 'AutentikasiController@signup');
            Route::post('signup-confirmation', 'AutentikasiController@signupConfirmation');
            Route::post('reset-password', 'AutentikasiController@resetPassword');
            Route::post('reset-password-confirmation', 'AutentikasiController@resetPasswordConfirmation');
            Route::get('all-user', 'AutentikasiController@allUser');
        });
        Route::group(['prefix' => 'confirmation', 'namespace' => 'Autentikasi'], function() {
            Route::post('send', 'ConfirmationController@send');
            Route::post('verify', 'ConfirmationController@verify');
        });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' =>'mocks/flip/assignment/21221391/transfer' ,'middleware' => ['auth:api'] ], function() {
    Route::post("transfer", "Api\V1\WalletController@transfer")->name("wallet.transfer");
    Route::post("create_user", "Api\V1\WalletController@createUser")->name("wallet.create_user");
    Route::post("balance_topup", "Api\V1\WalletController@balanceTopup")->name("wallet.balance_topup");
    Route::get("balance_read", "Api\V1\WalletController@balanceRead")->name("wallet.balance_read");
    Route::get("top_users", "Api\V1\WalletController@topUsers")->name("wallet.top_users");
    Route::get("top_transactions_per_user", "Api\V1\WalletController@topTransactionsPerUser")->name("wallet.top_transactions_per_user");
});
