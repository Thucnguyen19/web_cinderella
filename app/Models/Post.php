<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'post';
    public function category_post(): BelongsTo
    {
        return $this->belongsTo(related: CategoryPost::class, foreignKey: 'category_post_id');
    }
}
