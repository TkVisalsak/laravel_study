<?php

namespace Database\Seeders;

use App\Models\Menu;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Menu::create(['title' => 'Technology', 'sub_title' => 'technology']);
        Setting::create(['title' => 'CMS']);
        User::factory()->create([
            'name' => 'Tester',
            'role_id' => 1,
            'password' => bcrypt('admin123'),
            'email' => 'Admin@gmail.com',
            'is_superadmin' => 1,
        ]);
    }
}
