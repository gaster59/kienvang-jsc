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
    //'middleware' => 'checkRole:2',
    'as' => 'front.index',
    'uses' => 'IndexController@index'
]);
Route::get('/nenkin.html', [
    'as' => 'front.nenkin',
    'uses' => 'IndexController@getNenkin'
]);
Route::post('/nenkin.html', [
    'as' => 'front.checknenkin',
    'uses' => 'IndexController@postNenkin'
]);
Route::get('/tin-tuc.html', [
    'as' => 'front.news',
    'uses' => 'NewsController@index'
]);

Route::get('/tin-tuc/{id}/{slug?}.html', [
    'as' => 'front.news.detail',
    'uses' => 'NewsController@detail'
]);

Route::get('/dang-ky.html', [
    'as' => 'front.register',
    'uses' => 'UsersController@index'
]);
Route::post('/checkRegister', [
    'as' => 'front.checkRegister',
    'uses' => 'UsersController@checkRegister'
]);

Route::get('/dang-nhap', [
    'as' => 'front.dangnhap',
    'uses' =>'UsersController@getLogin'
]);
Route::post('/checkDangNhap',[
    'as'    => 'front.checkdangnhap',
    'uses'  => 'UsersController@postLogin'
]);
Route::get('/dang-xuat',[
    'as'    => 'front.getLogout',
    'uses'  => 'UsersController@getLogout'
]);
Route::get('/userinfo.html', [
    'as' => 'front.userinfo',
    'uses' => 'UsersController@getUserinfo'
]);
Route::post('/userinfo.html', [
    'as' => 'front.checkUserinfo',
    'uses' => 'UsersController@postUserinfo'
]);
Route::get('/jobs/{id}/{slug?}.html', [
    'as' => 'front.jobs.detail',
    'uses' => 'JobsController@detail'
]);
Route::get('/jobs/{slug}.html', [
    'as' => 'front.jobs.category',
    'uses' => 'JobsController@getCategory'
]);
Route::get('/apply/{id}/{slug?}.html', [
    'as' => 'front.jobs.apply',
    'uses' => 'JobsController@apply'
]);
Route::post('/checkApply', [
    'as' => 'front.jobs.checkApply',
    'uses' => 'JobsController@checkApply'
]);
Route::get('/gioi-thieu.html', [
    'as' => 'front.about-us',
    'uses' => 'IndexController@about'
]);
Route::get('/lien-he.html', [
    'as' => 'front.contact',
    'uses' => 'IndexController@getContact'
]);
Route::post('/lien-he.html', [
    'as' => 'front.checkContact',
    'uses' => 'IndexController@postContact'
]);
Route::get('/search', [
    'as' => 'front.search',
    'uses' => 'JobsController@getSearch'
]);
Route::get('/pagesearch.html', [
    'as' => 'front.pagesearch',
    'uses' => 'JobsController@getPageSearch'
]);
Route::post('/pagesearch.html', [
    'as' => 'front.postpagesearch',
    'uses' => 'JobsController@postPageSearch'
]);
// Route::group(['middleware' => 'checkUserLogin', 'prefix' => '', 'namespace' => ''], function() {
//     Route::get('/', function() {
//         return view('front.index');
//     });
// });
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
        Route::get('company/delete_permanently/{id}', [
            'as' => 'company.delete_permanently',
            'uses' => 'CompanyController@delete_permanently'
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

        /**
         * Contact
         */
        Route::get('contact', [
            'as' => 'contact',
            'uses' => 'ContactController@index'
        ]);
        Route::get('contact/updatestatus/{id}', [
            'as' => 'contact.updatestatus',
            'uses' => 'ContactController@updatestatus'
        ]);
        Route::get('contact/delete/{id}', [
            'as' => 'contact.delete',
            'uses' => 'ContactController@delete'
        ]);
        /**
         * User
         */
        Route::get('user', [
            'as' => 'user',
            'uses' => 'UserController@index'
        ]);
        Route::get('user/view/{id}', [
            'as' => 'user.view',
            'uses' => 'UserController@view'
        ]);
        Route::get('user/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'UserController@delete'
        ]);
        /**
         * Apply Job
         */
        Route::get('applyjob', [
            'as' => 'applyjob',
            'uses' => 'ApplyController@index'
        ]);
        Route::get('apply/view/{id}', [
            'as' => 'apply.view',
            'uses' => 'ApplyController@view'
        ]);
        Route::get('apply/delete/{id}', [
            'as' => 'apply.delete',
            'uses' => 'ApplyController@delete'
        ]);
        Route::get('apply/read/{id}', [
            'as' => 'apply.read',
            'uses' => 'ApplyController@read'
        ]);
        /*
        Nenkin
         */
        Route::get('pages', [
            'as' => 'pages',
            'uses' => 'PagesController@index'
        ]);
        Route::get('pages/edit/{id}', [
            'as' => 'pages.edit',
            'uses' => 'PagesController@edit'
        ]);
        Route::post('pages/store', [
            'as' => 'pages.store',
            'uses' => 'PagesController@store'
        ]);
        Route::get('nenkin', [
            'as' => 'nenkin',
            'uses' => 'NenkinController@index'
        ]);
        Route::get('nenkin/updatestatus/{id}', [
            'as' => 'nenkin.updatestatus',
            'uses' => 'NenkinController@updatestatus'
        ]);
        Route::get('nenkin/delete/{id}', [
            'as' => 'nenkin.delete',
            'uses' => 'NenkinController@delete'
        ]);
        
    }
);
/*Route admin/... */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
