<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use App\Models\RolesPermission\Permission;
use App\Models\RolesPermission\Profile;

class ProfileService
{
    /**
     * assign all permissions of the models to the specified profile
     * @return true
     * @var array $models
     * @var string $profile_id
     */
    public function assignModelsPermissionsToProfile(int $profile_id, array $models): bool
    {
        $permissions = Permission::join('models', 'models.id', '=', 'permissions.model_id')->whereIn('models.name', $models)->pluck('permissions.id')->toArray();
        Profile::find($profile_id)->permissions()->syncWithoutDetaching($permissions);
        return true;
    }

    /**
     * assign all permissions of the models of the modules to the specified profile
     * @return true
     * @var string $module_name
     * @var int $profile_id
     */
    public function assigndModulePermissionsToProfile(int $profile_id, string $module_name): bool
    {
        $permissions = Permission::join('modules', 'modules.id', '=', 'permissions.module_id')->where('modules.name', $module_name)->pluck('permissions.id')->toArray();
        Profile::find($profile_id)->permissions()->syncWithoutDetaching($permissions);
        return true;
    }

    /**
     * clear cache of all permissions of the users of the profile
     * @param int $profile_id
     * @return bool
     */
    public function clearUsersProfilePermissionsCache(int $profileId): bool
    {
        $roles = Profile::with('roles')->where('id', $profileId)->first()->roles;
        foreach ($roles as $role) {
            $users = $role->users;
            foreach ($users as $user) {
                Cache::forget('user_permissions_' . $user->id);
            }
        }
        return true;
    }
}
