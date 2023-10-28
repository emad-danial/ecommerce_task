<?php

namespace Database\Seeders;

use App\Helpers\ModelService;
use App\Helpers\ProfileService;
use App\Models\RolesPermission\Module;
use App\Models\RolesPermission\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->area();
        $this->city();
        $this->district();
    }

    private function area()
    {
        $module = Module::firstOrCreate(['name' => 'areas', 'created_at' => now(), 'updated_at' => now()]);
        Permission::insert(['name' => "access-areas", 'module_id' => $module->id, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]);
        $model_service = new ModelService();
        $model_service->createModelAndAssignPermissions('areas', $module->id, [
            'listening-areas',
            'create-area',
            'update-area',
            'view-area'
        ]);
        $profile_service = new ProfileService();
        $profile_service->assigndModulePermissionsToProfile(1, 'areas');
    }

    private function city()
    {
        $module = Module::firstOrCreate(['name' => 'cities', 'created_at' => now(), 'updated_at' => now()]);
        Permission::insert(['name' => "access-cities", 'module_id' => $module->id, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]);
        $model_service = new ModelService();
        $model_service->createModelAndAssignPermissions('areas', $module->id, [
            'listening-cities',
            'create-city',
            'update-city',
            'view-city'
        ]);
        $profile_service = new ProfileService();
        $profile_service->assigndModulePermissionsToProfile(1, 'cities');
    }

    public function district()
    {
        $module = Module::firstOrCreate(['name' => 'districts', 'created_at' => now(), 'updated_at' => now()]);
        Permission::insert(['name' => "access-districts", 'module_id' => $module->id, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]);
        $model_service = new ModelService();
        $model_service->createModelAndAssignPermissions('areas', $module->id, [
            'listening-districts',
            'create-district',
            'update-district',
            'view-district'
        ]);
        $profile_service = new ProfileService();
        $profile_service->assigndModulePermissionsToProfile(1, 'districts');
    }
}
