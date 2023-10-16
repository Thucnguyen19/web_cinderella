<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    protected $table = 'category_post';
    public function categoryPostChildrent()
    {
        // Tao relationship giữa parentid và id ;
        return $this->hasMany(CategoryPost::class, foreignKey: 'parent_id');
    }
}
