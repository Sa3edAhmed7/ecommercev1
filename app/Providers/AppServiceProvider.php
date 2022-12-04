<?php

namespace App\Providers;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
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
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d864.0097378559639!2d31.146849570823644!3d29.978310560553858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145845d72441f427%3A0x8d70bea5eb5def25!2z2YXYudmF2YQg2KfYqNmIINin2YTZh9mI2YQg2YTZhNiq2K3Yp9mK2YQg2KfZhNi32KjZitmH!5e0!3m2!1sar!2seg!4v1670174017075!5m2!1sar!2seg',
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


        $user = User::firstOr(function () {
            return User::create([
            'name' => 'Saeid Ahmed',
            'email' => 'saeidahmed774@gmail.com',
            'password' => bcrypt('12345678'),
            'password_confirmation' => bcrypt('12345678'),
            'utype' => 'ADM'
        ]);
        });
        view()->share('user', $user);

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
