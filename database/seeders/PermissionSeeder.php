<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Permission::create(['name'=>'manage departments']);
        Permission::create(['name'=>'manage staffs']);
        Permission::create(['name'=>'manage schools']);
        Permission::create(['name'=>'manage internships']);
        Permission::create(['name'=>'manage interns']);
        Permission::create(['name'=>'manage applications']);
        Permission::create(['name'=>'readDelete internships']);
        Permission::create(['name'=> 'readDelete interns']);
        Permission::create(['name'=>'readDelete applications']);
        Permission::create(['name'=>'apply internships']);
    }
}
