<?php

namespace App\Models\RolesPermission;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name', 'actions'];

    public function getActionsAttribute()
    {
        return null;
    }

    /**
     * get the users of the role
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * get the profiles of the translation
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'role_profiles');
    }

    /**
     * get the permissions of the role
     */
    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, Profile::class);
    }

    /**
     * get all roles which report to the current role
     */
    public function reportsToMe()
    {
        return $this->hasMany(Role::class, 'report_to');
    }
}
