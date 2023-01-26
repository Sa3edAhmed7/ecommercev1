<?php

namespace App\Providers;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\LinkApp;
use App\Models\Setting;
use App\Models\AboutPayment;
use App\Models\HomeCategory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

            'twiter' => 'https://www.twitter.com',
            'facebook' => 'https://www.facebook.com',
            'pinterest' => 'https://www.pinterest.com',
            'instagram' => 'https://www.instagram.com',
            'youtube' => 'https://www.youtube.com'

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


        $permission = Permission::firstOr(function () {
            $perms = [

            'Dashboard',

            'Profile',
            'Update Profile',
            'Change Password',

            'Settings',
            'Settings Web',

            'Attributes',
            'All Attributes',
            'Add New Attribute',
            'Edit Attribute',
			'delete attribute',

            'Manage Home Slider',
            'All slides',
            'Add New Slide',
            'Edit Slide',
			'delete slider',

            'Manage Home Categories',
            'Sale Setting',

            'All Coupons',
            'Add New Coupon',
            'Edit Coupon',
			'delete coupon',


            'About Payment',
            'Links App',
            'Main',

            'Categories',
            'All Categories',
            'Add New Category',
            'Edit Category',
			'delete category',


            'Products',
            'All Products',
            'Add New Product',
            'Edit Product',
			'delete product',

            'Orders',
            'All Orders',
            'Ordered Details',

            'Messages',
            'View Message',

            'Pages',
            'All Pages',
            'Add New Page',
            'Edit Page',
			'delete page',

            'Users',
            'All Users',
            'Create New Account',
            'Edit Your account',
			'delete user',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            ];
            foreach ($perms as $perm) {
            Permission::create(['name' => $perm]);
            }
        });
        view()->share('permission', $permission);

        $user = User::firstOr(function () {
            return User::create([
            'name' => 'Saeid Ahmed',
            'email' => 'saeidahmed774@gmail.com',
            'password' => bcrypt('12345678'),
            'password_confirmation' => bcrypt('12345678'),
            'utype' => 'SADM',
            'role' => 'SADM'
        ]);

        });
        view()->share('user', $user);

        $role = Role::firstOr(function () {
            return Role::create([
            'name' => 'SADM',
        ]);
        });
        view()->share('role', $role);

        if(!$permission){
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        }




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
