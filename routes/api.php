<?php



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
Route::post('register/customer', 'API\RegisterController@register_customer'); // To register customer

Route::post('register/merchant', 'API\RegisterController@register_merchant'); // To register merchant

Route::post('login', 'API\LoginController@login'); // To login merchant and customer

Route::middleware('auth:api')->group( function () {
	
	Route::prefix('customer')->group(function () {

		Route::middleware('customer')->group( function () {
    	
    	
    	});

    });

    Route::prefix('merchant')->group(function () {
		
		Route::middleware('merchant')->group( function () {

    		Route::prefix('product')->group(function () {

    			Route::post('add', 'API\Merchant\ProductController@store');
    			Route::put('update/{id}', 'API\Merchant\ProductController@edit');
    			Route::middleware('product.merchant')->group( function () {
			    	
			    	
			    	Route::delete('delete/{id}', 'API\Merchant\ProductController@delete');

		    	});

    		});

    	});

    });

});