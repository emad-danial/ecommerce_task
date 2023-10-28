<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Super Admin',
            'email'     => 'super-admin@admin.com',
            'phone'     => '+9665039807'.Str::random(5),
            'type'      => 'admin',
            'is_active' => 1,
            'role_id'   => '1',
            'password'  => Hash::make('user123'),
        ]);

    }
}
