<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $permissions = [
            'All Pages',
            'Dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            }
            $user = User::create([
                'name' => 'Saeid Ahmed', 
                'email' => 'saeidahmed774@gmail.com',
                'password' => bcrypt('12345678'),
                'password_confirmation' => bcrypt('12345678'),
                'utype' => ["ADM"],
                ]);
                    $role = Role::create(['name' => 'ADM']);
            
                    $permissions = Permission::pluck('id','id')->all();
                
                    $role->syncPermissions($permissions);
                
                    $user->assignRole([$role->id]);

        // \App\Models\Category::factory(6)->create();
        // \App\Models\Product::factory(9)->create();
    }
}
