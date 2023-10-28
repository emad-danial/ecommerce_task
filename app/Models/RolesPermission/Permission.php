<?php

namespace App\Models\RolesPermission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RolesPermission\Model as ModulesModel;

class Permission extends Model
{
    use HasFactory;

    /**
     * Get the module of the permission.
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Get the model of the permission.
     */
    public function model()
    {
        return $this->belongsTo(ModulesModel::class, 'module_id');
    }

    /**
     * The profiles those belong to the permission.
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_permissions');
    }
}
