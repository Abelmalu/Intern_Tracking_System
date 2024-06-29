<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Role::create(['name' => 'admin'])->syncPermissions(['manage schools','manage staffs','manage departments', 'readDelete internships', 'readDelete interns', 'readDelete applications']);
         Role::create(['name' => 'school'])->syncPermissions(['manage departments', 'readDelete internships', 'readDelete interns', 'readDelete applications']);
         Role::create(['name' => 'department'])->syncPermissions('manage internships','manage interns','manage applications');
         Role::create(['name' => 'user'])->syncPermissions('apply internships');
    }
}
