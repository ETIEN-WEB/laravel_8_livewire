<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', 'HomeController@produits')->name('home');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::group(['prefix'=>'produit'],function (){
    Route::get('/produit','HomeController@produits')->name('produit');
    Route::get('/edit-produit-{produit}',[\App\Http\Controllers\ProduitController::class,'edit'])->name('produit.edit');
    Route::get('/delete-image-{produit}-{image}',[\App\Http\Controllers\ProduitController::class,'deleteImage'])->name('produit.deleteimage');
    Route::post('/update-produit-{produit}',[\App\Http\Controllers\ProduitController::class,'update'])->name('produit.update');
    Route::get('/destroy-produit-{produit}',[\App\Http\Controllers\ProduitController::class,'destroy'])->name('produit.destroy');
});
Route::group(['prefix'=>'section'], function (){
   Route::get('/parametre','HomeController@parametre')->name('parametre');
   Route::post('/change-password','HomeController@changePassword')->name('password');
   Route::post('/update-annonceur-{annonceur}','HomeController@update')->name('update');
});

Route::get('/etien', function () {
    return 'huberson';
});