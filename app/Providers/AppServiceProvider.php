<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if( !in_array(Request::segment(1), array('admin'))){
            /**
             * [$bannersfooter description]
             * @var [type]
             */
            $bannersfooter = DB::table('banners')->where('type', 3)->get();
            View::share('bannersfooter', $bannersfooter);
            /**
             * [$companies_right description]
             * @var [type]
             */
            $arr = [['status', '=', '1'], ['is_home', '=', '1']];
            $companies_right = DB::table('companies')->select('id','name', 'avatar','website')->where($arr)->orderByRaw('id DESC')->get();
            View::share('companies_right', $companies_right);
            /**
             * [$bannermain description]
             */
            $w = [['banners.type', '=', '2']];
            $bannerMain = DB::table('banners')->where($w)->first();
            View::share('bannerMain', $bannerMain);

        }
        



        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            return preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
        });
        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute',$attribute, 'Không phải là số điện thoại đúng');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}
