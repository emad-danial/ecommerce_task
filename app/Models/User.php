<?php

namespace App\Models;

use App\Models\RolesPermission\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'type',
        'is_active',
        'role_id',
        'password',
        'phone',
        'avatar',
        'type',
        'is_active',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasPermission(string $permission): bool
    {
        $permissions = $this->permissions()->where('permission', $permission);
        return count($permissions) ? true : false;
    }

    public function permissions(): Collection
    {
        $user = $this;

        return DB::table('permissions')->join('profile_permissions', 'permissions.id', '=', 'profile_permissions.permission_id')
            ->join('profiles', 'profiles.id', '=', 'profile_permissions.profile_id')
            ->join('role_profiles', 'role_profiles.profile_id', '=', 'profiles.id')
            ->join('modules', 'permissions.module_id', '=', 'modules.id')
            ->leftJoin('models', 'permissions.model_id', '=', 'models.id')
            ->select(
                [
                    'permissions.id',
                    DB::raw('permissions.name AS permission'),
                    DB::raw('modules.name AS module_name'),
                    DB::raw('models.name AS model_name'),
                ]
            )
            ->where([
                ['role_profiles.role_id', $user->role_id],
                ['modules.is_active', 1]
            ])->where(function ($query) {
                $query->where('models.is_active', 1)->orWhereNull('permissions.model_id');
            })->get();
    }

    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class,'role_id');
    }


}
