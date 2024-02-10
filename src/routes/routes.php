<?php

use Services\Payment\GatewayProviders\CafebazaarProvider\Cafebazaar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| Here is where you can register payment routes for your application. These
| routes are loaded by the RouteServiceProvider
|
*/

Route::get('/cafebazaar/redirect', function(Illuminate\Http\Request $request) {
    return Cafebazaar::handleRedirect($request);
});
