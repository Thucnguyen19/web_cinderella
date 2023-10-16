<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes; // them vao de chay softdelete 
    protected $table = 'categories';
    protected $guarded = [];
    public function categoryChildrent()
    {
        // Tao relationship giữa parentid và id ;
        return $this->hasMany(Category::class, foreignKey: 'parent_id');
    }
}
//đc tạo từ câu lệnh php artisan make:model Category -m trong terminal 