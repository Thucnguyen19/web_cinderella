<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function permissionsChildrent()
    {
        return $this->hasMany(related: Permission::class, foreignKey: 'parent_id');
    }
}
