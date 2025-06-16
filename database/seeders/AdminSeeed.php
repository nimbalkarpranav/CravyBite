<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Admin::create([
    'name' => 'Admin',
    'email' => 'admin12@gmail.com',
    'password' => bcrypt('admin@123'),
    'role' => 'admin',
]);
    }
}
