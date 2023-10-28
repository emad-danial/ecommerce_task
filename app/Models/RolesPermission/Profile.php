<?php

namespace App\Models\RolesPermission;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        $profile = $this;
        return Cache::rememberForever('users_management_profile_' . $this->id . '_' .  App::getLocale(), function () use ($profile) {
            $profile = $profile->translation()->where('language_id', getCurrentLanguage()->id)->first();
            return $profile ? $profile->name : null;
        });
    }

    /**
     * The roles of the current profile
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_profiles');
    }

    /**
     * The permissions those belong to the profile.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'profile_permissions', 'profile_id', 'permission_id');
    }
}
