<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('navbars')->insert([
            ['title' => 'Dashboard', 'url' => '/dashboard', 'icon' => 'dashboard'],
            ['title' => 'Users', 'url' => '/users', 'icon' => 'users'],
            ['title' => 'Settings', 'url' => '/settings', 'icon' => 'settings'],
        ]);
    }
}