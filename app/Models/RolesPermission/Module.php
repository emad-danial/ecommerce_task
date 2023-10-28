<?php

namespace App\Models\RolesPermission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RolesPermission\Model as ModulesModel;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the models of the module.
     */
    public function models()
    {
        return $this->hasMany(ModulesModel::class, 'module_id');
    }

    /**
     * Get the permissions of the module.
     */
    public function permssions()
    {
        return $this->hasMany(Permission::class);
    }
}
