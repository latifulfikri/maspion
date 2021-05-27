<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        Role::create(['role_name' => 'Admin']);
        Role::create(['role_name' => 'User']);
        Category::create([
            'category_name' => 'CPUs',
            'style' => 'danger'
        ]);
        Category::create(['category_name' => 'GPUs', 'style' => 'primary']);
        Category::create(['category_name' => 'Laptop', 'style' => 'warning']);
        Category::create(['category_name' => 'PC', 'style' => 'success']);
        Category::create(['category_name' => 'Accessories', 'style' => 'info']);
        Category::create(['category_name' => 'IOT', 'style' => 'primary']);
    }
}
