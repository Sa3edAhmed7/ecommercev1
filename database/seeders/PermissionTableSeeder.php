<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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

        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
