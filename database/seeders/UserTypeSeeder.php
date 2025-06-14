<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_type')->insert([
            ['type' => 'User',         'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Employee',     'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Admin',        'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Super Admin',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}