<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserMoveToDBController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get( '/', 'PagesController@index' )->middleware( 'auth' );
Route::get( '/jsonTable', [DashboardController::class, 'jsonTable']);

Route::get( '/logout', 'Auth\LoginController@logout' );

// Demo routes
// Route::get('/datatables', 'PagesController@datatables');
// Route::get('/ktdatatables', 'PagesController@ktDatatables');
// Route::get('/select2', 'PagesController@select2');
// Route::get('/jquerymask', 'PagesController@jQueryMask');
// Route::get('/icons/custom-icons', 'PagesController@customIcons');
// Route::get('/icons/flaticon', 'PagesController@flaticon');
// Route::get('/icons/fontawesome', 'PagesController@fontawesome');
// Route::get('/icons/lineawesome', 'PagesController@lineawesome');
// Route::get('/icons/socicons', 'PagesController@socicons');
// Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get( '/quick-search', 'PagesController@quickSearch' )->name( 'quick-search' );

Auth::routes(

);

Route::get( '/home', [App\Http\Controllers\PagesController::class, 'index'] )->name( 'home' );

// Dashboard views
Route::group( ['middleware' => 'auth'], function () {
    Route::get( '/admin/system-setup', [DashboardController::class, 'systemSetup'] );
    Route::get( '/admin/apis', [DashboardController::class, 'apis'] );
    Route::get( '/admin/roles', [DashboardController::class, 'roles'] );
    Route::get( '/admin/permissions', [DashboardController::class, 'permissions'] );
    Route::get( '/admin/configuration-models', [DashboardController::class, 'configurationModels'] );
    Route::get( '/admin/languages', [DashboardController::class, 'languages'] );

    Route::get( '/user/all-users', [DashboardController::class, 'allUsers'] )->name( 'alluser' );
    Route::get( '/user/service-providers', [DashboardController::class, 'serviceProviders'] );
    Route::get( '/user/customers', [DashboardController::class, 'customers'] );
    Route::get( '/user/{id}', [DashboardController::class, 'singleuser'] );

    Route::get( '/jobs/all-jobs', [DashboardController::class, 'allJobs'] );
    Route::get( '/jobs/scheduled', [DashboardController::class, 'scheduled'] );
    Route::get( '/jobs/in-progress', [DashboardController::class, 'inProgress'] );
    Route::get( '/jobs/completed', [DashboardController::class, 'completed'] );

    Route::get( '/accounts-finance', [DashboardController::class, 'accountsFinance'] );
    Route::get( '/reports', [DashboardController::class, 'reports'] );
    Route::get( '/tasks', [DashboardController::class, 'tasks'] );

    Route::get( '/support-center/chat', [DashboardController::class, 'chat'] );
    Route::get( '/support-center/emails', [DashboardController::class, 'eMails'] );
    Route::get( '/support-center/tickets', [DashboardController::class, 'tickets'] );
    Route::get( '/support-center/articles', [DashboardController::class, 'articles'] );
    Route::get( '/support-center/faqs', [DashboardController::class, 'faqs'] );
    Route::get( '/support-center/training-videos', [DashboardController::class, 'trainingVideos'] );
} );

Auth::routes(

);

// Route::get('/migration', function (){
//     Artisan::call( 'migrate' );
// });
Route::group( ['middleware' => 'auth'], function () {
    Route::get( '/user_move', [UserMoveToDBController::class, 'insert_user']);
    Route::get('/update_profile/{country}', [UserMoveToDBController::class, 'update_profile_url']);
});