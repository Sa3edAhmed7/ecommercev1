<?php

namespace App\Providers;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\LinkApp;
use App\Models\Setting;
use App\Models\AboutPayment;
use App\Models\HomeCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()){
            $setting = Setting::firstOr(function () {
            return Setting::create([
            'email' => 'ecommerce@e.com',
            'phone' => '123456789',
            'phone2' => '123456789',
            'address' => 'test',
            'map' => 'test',
            'twiter' => 'twiter',
            'facebook' => 'facebook',
            'pinterest' => 'pinterest',
            'instagram' => 'instagram',
            'youtube' => 'youtube',
        ]);
        });
        view()->share('setting', $setting);

        $home_category = HomeCategory::firstOr(function () {
            return HomeCategory::create([
            'sel_categories' => '0',
            'no_of_products' => '0'

        ]);
        });
        view()->share('home_category', $home_category);

        $sale = Sale::firstOr(function () {
            return Sale::create([
            'sale_date' => Carbon::now(),
            'status' => '0'

        ]);
        });
        view()->share('sale', $sale);


        $aboutpay = AboutPayment::firstOr(function () {
            return AboutPayment::create([
            'freeshipping' => '100',
            'guarantee' => '15',
        ]);
        });
        view()->share('aboutpay', $aboutpay);


        $linkapp = LinkApp::firstOr(function () {
            return LinkApp::create([
            'googleplay' => 'https://play.google.com/store/games',
            'appstore' => 'https://www.apple.com/app-store/',
        ]);
        });
        view()->share('linkapp', $linkapp);

        }
    }
}
