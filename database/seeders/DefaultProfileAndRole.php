<?php

namespace Database\Seeders;

use App\Models\RolesPermission\Profile;
use App\Models\RolesPermission\Role;
use Illuminate\Database\Seeder;

class DefaultProfileAndRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::create([
            'id'   => 1,
            'name' => 'Super Admin',
        ]);

        $role = Role::create([
            'id'        => 1,
            'name'      => 'CEO',
            'is_active' => 1,
        ]);
        $role->profiles()->sync($profile->id);
    }
}
