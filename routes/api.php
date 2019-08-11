<?php

Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('signup', 'AuthController@signup');
	
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

//pos route

Route::get('/get-product-by-cat-id/{id}', 'API\PosController@GetPorductByCatId');

//customer route
Route::apiResource('/customer', 'API\CustomerController');


//employee route
Route::apiResource('/create-employee', 'API\EmployeesController');
Route::apiResource('/employees', 'API\EmployeesController');


//supplier route
Route::apiResource('/supplier', 'API\SupplierController');

//category api route
Route::apiResource('/category', 'API\CategoryController');

//product api route

Route::apiResource('/product', 'API\ProductController');

//expense route
Route::apiResource('/expense', 'API\ExpenseController');

//salary Route
Route::apiResource('/salary', 'API\SalaryController');
Route::get('/salary-based-month/{id}', 'API\SalaryController@salary_based_month');





