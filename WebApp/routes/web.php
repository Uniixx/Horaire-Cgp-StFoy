<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',                                             'AdminUsersController@index')->name('index');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('dayclasses')->name('dayclasses/')->group(static function() {
            Route::get('/',                                             'DayclassController@index')->name('index');
            Route::get('/create',                                       'DayclassController@create')->name('create');
            Route::post('/',                                            'DayclassController@store')->name('store');
            Route::get('/{dayclass}/edit',                              'DayclassController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DayclassController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dayclass}',                                  'DayclassController@update')->name('update');
            Route::delete('/{dayclass}',                                'DayclassController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('horaires')->name('horaires/')->group(static function() {
            Route::get('/',                                             'HoraireController@index')->name('index');
            Route::get('/create',                                       'HoraireController@create')->name('create');
            Route::post('/',                                            'HoraireController@store')->name('store');
            Route::get('/{horaire}/edit',                               'HoraireController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'HoraireController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{horaire}',                                   'HoraireController@update')->name('update');
            Route::delete('/{horaire}',                                 'HoraireController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('configs')->name('configs/')->group(static function() {
            Route::get('/',                                             'ConfigController@index')->name('index');
            Route::get('/create',                                       'ConfigController@create')->name('create');
            Route::post('/',                                            'ConfigController@store')->name('store');
            Route::get('/{config}/edit',                                'ConfigController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ConfigController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{config}',                                    'ConfigController@update')->name('update');
            Route::delete('/{config}',                                  'ConfigController@destroy')->name('destroy');
        });
    });
});