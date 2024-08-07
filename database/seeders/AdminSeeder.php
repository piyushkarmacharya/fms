<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'=>"Admin",
            "contact_number"=>"9876543210",
            "email"=>"admin@gmail.com",
            "password"=>"adminadmin"
        ]);
    }
}
