<?php

namespace Database\Seeders;

use App\Helpers\ModelService;
use App\Helpers\ProfileService;
use App\Models\RolesPermission\Module;
use App\Models\RolesPermission\Permission;
use Illuminate\Database\Seeder;

class UsersPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = Module::firstOrCreate(['name' => 'users', 'created_at' => now(), 'updated_at' => now()]);
        Permission::insert(['name' => "access-users", 'module_id' => $module->id, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]);
        $model_service = new ModelService();
        $model_service->createModelAndAssignPermissions('users', $module->id, [
            'listening-users',
            'create-user',
            'update-user',
            'view-user'
        ]);
        $profile_service = new ProfileService();
        $profile_service->assigndModulePermissionsToProfile(1, 'users');
    }
}
