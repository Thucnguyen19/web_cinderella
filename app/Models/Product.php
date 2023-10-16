<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(related: ProductImage::class, foreignKey: 'product_id');
    }
    public function tags()
    {
        return $this->belongsToMany(related: Tag::class, table: 'product_tags', foreignPivotKey: 'product_id', relatedPivotKey: 'tag_id')->withTimestamps(); //(Model, table name, primary key, foreign key)
    }
    public function colors()
    {
        return $this->belongsToMany(related: Color::class, table: 'product_color', foreignPivotKey: 'product_id', relatedPivotKey: 'color_id')->withTimestamps(); //(Model, table name, primary key, foreign key)
    }
    public function sizes()
    {
        return $this->belongsToMany(related: Size::class, table: 'product_size', foreignPivotKey: 'product_id', relatedPivotKey: 'size_id')->withTimestamps(); //(Model, table name, primary key, foreign key)
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class, foreignKey: 'category_id');
    }
    public function productImage()
    {
        return $this->hasMany(related: ProductImage::class, foreignKey: 'product_id');
    }
    public function reviewProduct()
    {
        return $this->hasMany(related: ReviewProduct::class, foreignKey: 'product_id');
    }
}
