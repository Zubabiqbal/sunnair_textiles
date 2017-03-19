<?php

namespace App;

class Category extends BaseModel
{
    protected $fillable = ['title', 'status'];

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function isChild()
    {
        return !is_null($this->parent_id);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }


}
