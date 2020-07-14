<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/admin'], function (){
    Route::redirect('/', '/admin/dashboard');

    Route::name('admin.')->namespace('Admin')->group(function(){
        Auth::routes();

        Route::group(['middleware'=>'auth:admin'], function (){
            Route::get('/dashboard', 'HomeController@index')->name('dashboard');
            Route::get('/posts', 'PostController@index')->name('posts.index');
            Route::get('/posts/{id}', 'PostController@show')->name('posts.show');
            Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
            Route::resource('roles', 'RoleController');
            Route::resource('users', 'UserController');
        });
    });

});


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function (){
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::put('/profile', 'UserController@profileUpdate')->name('profile.update');
});



### Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

### Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

### Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

### Confirm Password (added in v6.2)
//Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

### Email Verification Routes...
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
