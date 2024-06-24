<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create(
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'email_verified_at'=>now(),
                'password'=> '$2y$12$nVPA.etTD9A3TuHZ9z9afux8qgOPuxwFslL9FDO.UiLvBwEzR.nrO',


            ]
        )->assignRole('admin');

    }
}
