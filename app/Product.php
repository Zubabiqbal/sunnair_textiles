<?php

namespace App;

class Product extends BaseModel
{
    protected $fillable = ['title', 'status', 'path', 'description'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeHavePhoto($query)
    {
        return $query->whereNotNull('path');
    }


    public function getImagePath()
    {
        return  url('products\\'. $this->path);
    }
}
