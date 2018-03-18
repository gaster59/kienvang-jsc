<?php

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

use App\Http\Middleware\CheckRole;

Route::get('/', [
    'as' => 'front.index',
    'uses' => 'IndexController@index'
]);

Route::get('/tin-tuc', [
    'as' => 'front.news',
    'uses' => 'NewsController@index'
]);

Route::get('/tin-tuc/{id}/{slug?}', [
    'as' => 'front.news.detail',
    'uses' => 'NewsController@detail'
]);

/*
 * Login
 */
Route::get('admin/login', [
    'as' => 'admin.login',
    'uses' => 'Admin\LoginController@index'
]);
Route::get('admin/login/logout', [
    'as' => 'admin.logout',
    'uses' => 'Admin\LoginController@logout'
]);
Route::post('admin/login/checkLogin', [
    'as' => 'login.user',
    'uses' => 'Admin\LoginController@checkLogin'
]);
Route::get('admin/login/register', [
    'as' => 'admin.insert.user',
    'uses' => 'Admin\LoginController@registerUser'
]);

Route::group([
    'namespace' => 'Ajax',
    'prefix' => 'ajax'], function () {

        /*
         * Ajax imports
         */
        Route::post('imports/store', [
            'as' => 'ajax.imports',
            'uses' => 'ImportsController@store'
        ]);

        Route::post('imports/detail', [
            'as' => 'ajax.imports.detail',
            'uses' => 'ImportsController@getDetail'
        ]);
    }
);

/*Route admin/... */
Route::group([
    'namespace' => 'admin',
    'middleware' => 'checkRole:1',
    'prefix' => 'admin'], function () {

        /*
         * Category
         */
        Route::get('category', [
            'as' => 'category',
            'uses' => 'CategoryController@index'
        ]);
        Route::get('category/add', [
            'as' => 'category.add',
            'uses' => 'CategoryController@add'
        ]);
        Route::get('category/edit/{id}', [
            'as' => 'category.edit',
            'uses' => 'CategoryController@edit'
        ]);
        Route::post('category/store', [
            'as' => 'category.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('category/delete/{id}', [
            'as' => 'category.delete',
            'uses' => 'CategoryController@delete'
        ]);

        /*
         * Product
         */
        Route::get('product', [
            'as' => 'product',
            'uses' => 'ProductController@index'
        ]);
        Route::get('product/add', [
            'as' => 'product.add',
            'uses' => 'ProductController@add'
        ]);
        Route::get('product/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'ProductController@edit'
        ]);
        Route::post('product/store', [
            'as' => 'product.store',
            'uses' => 'ProductController@store'
        ]);
        Route::get('product/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'ProductController@delete'
        ]);

        /*
         * Expense
         */
        Route::get('expense', [
            'as' => 'expense',
            'uses' => 'ExpensesController@index'
        ]);
        Route::get('expense/add', [
            'as' => 'expense.add',
            'uses' => 'ExpensesController@add'
        ]);
        Route::get('expense/edit/{id}', [
            'as' => 'expense.edit',
            'uses' => 'ExpensesController@edit'
        ]);
        Route::post('expense/store', [
            'as' => 'expense.store',
            'uses' => 'ExpensesController@store'
        ]);
        Route::get('expense/delete/{id}', [
            'as' => 'expense.delete',
            'uses' => 'ExpensesController@delete'
        ]);

        /*
         * Statistic
         */
        Route::get('statistic/', [
            'as' => 'statistic',
            'uses' => 'StatisticController@index'
        ]);

        /*
         * Location
         */
        Route::get('location/', [
            'as' => 'location',
            'uses' => 'LocationController@index'
        ]);

        /*
         * Company
         */
        Route::get('company', [
            'as' => 'company',
            'uses' => 'CompanyController@index'
        ]);
        Route::get('company/add', [
            'as' => 'company.add',
            'uses' => 'CompanyController@add'
        ]);
        Route::get('company/edit/{id}', [
            'as' => 'company.edit',
            'uses' => 'CompanyController@edit'
        ]);
        Route::post('company/store', [
            'as' => 'company.store',
            'uses' => 'CompanyController@store'
        ]);
        Route::get('company/delete/{id}', [
            'as' => 'company.delete',
            'uses' => 'CompanyController@delete'
        ]);

        /*
         * news
         */
        Route::get('news', [
            'as' => 'news',
            'uses' => 'NewsController@index'
        ]);
        Route::get('news/add', [
            'as' => 'news.add',
            'uses' => 'NewsController@add'
        ]);
        Route::get('news/edit/{id}', [
            'as' => 'news.edit',
            'uses' => 'NewsController@edit'
        ]);
        Route::post('news/store', [
            'as' => 'news.store',
            'uses' => 'NewsController@store'
        ]);
        Route::get('news/delete/{id}', [
            'as' => 'news.delete',
            'uses' => 'NewsController@delete'
        ]);

        /**
         * Banner
         */
        Route::get('banner', [
            'as' => 'banner',
            'uses' => 'BannerController@index'
        ]);
        Route::get('banner/add', [
            'as' => 'banner.add',
            'uses' => 'BannerController@add'
        ]);
        Route::get('banner/edit/{id}', [
            'as' => 'banner.edit',
            'uses' => 'BannerController@edit'
        ]);
        Route::post('banner/store', [
            'as' => 'banner.store',
            'uses' => 'BannerController@store'
        ]);
        Route::get('banner/delete/{id}', [
            'as' => 'banner.delete',
            'uses' => 'BannerController@delete'
        ]);

        /**
         * Major
         */
        Route::get('major', [
            'as' => 'major',
            'uses' => 'MajorController@index'
        ]);
        Route::get('major/add', [
            'as' => 'major.add',
            'uses' => 'MajorController@add'
        ]);
        Route::get('major/edit/{id}', [
            'as' => 'major.edit',
            'uses' => 'MajorController@edit'
        ]);
        Route::post('major/store', [
            'as' => 'major.store',
            'uses' => 'MajorController@store'
        ]);
        Route::get('major/delete/{id}', [
            'as' => 'major.delete',
            'uses' => 'MajorController@delete'
        ]);

        /**
         * Job
         */
        Route::get('job', [
            'as' => 'job',
            'uses' => 'JobController@index'
        ]);
        Route::get('job/add', [
            'as' => 'job.add',
            'uses' => 'JobController@add'
        ]);
        Route::get('job/edit/{id}', [
            'as' => 'job.edit',
            'uses' => 'JobController@edit'
        ]);
        Route::post('job/store', [
            'as' => 'job.store',
            'uses' => 'JobController@store'
        ]);
        Route::get('job/delete/{id}', [
            'as' => 'job.delete',
            'uses' => 'JobController@delete'
        ]);
    }
);
/*Route admin/... */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
