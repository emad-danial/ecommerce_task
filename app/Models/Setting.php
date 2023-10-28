<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table    = 'settings';
    protected $fillable = [
        'key_name',
        'value_ar',
        'value_en',
        'path',
        'value_type',
        'group'
    ];
}
