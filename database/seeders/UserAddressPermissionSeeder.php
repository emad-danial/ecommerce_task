<?php

namespace Database\Seeders;

use App\Helpers\ModelService;
use App\Helpers\ProfileService;
use App\Models\RolesPermission\Module;
use App\Models\RolesPermission\Permission;
use Illuminate\Database\Seeder;

class UserAddressPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = Module::firstOrCreate(['name' => 'users-addresses', 'created_at' => now(), 'updated_at' => now()]);
        Permission::insert(['name' => "access-user-addresses", 'module_id' => $module->id, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]);
        $model_service = new ModelService();
        $model_service->createModelAndAssignPermissions('users', $module->id, [
            'listening-users-addresses',
            'create-user-address',
            'update-user-address',
            'view-user-address'
        ]);
        $profile_service = new ProfileService();
        $profile_service->assigndModulePermissionsToProfile(1, 'users-addresses');
    }
}
